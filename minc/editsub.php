<?php
include "header.php";
include "right.php";
$medo= new medo();
$sbffm="||.s.b. .f.m.||";
$submit = '';
$dis = '';


#####
if (@$_GET['action'] == 'edit') {
    $eid= isset($_GET['num']) ? intval($_GET['num']) : "" ;
	$medo1 = $medo->selectw('sub','id',$eid);
	if (mysqli_num_rows($medo1) > 0 ) {
	$row = $medo->fassoc($medo1);
	$cats = explode(" ; ", $row['ca']);
		mysqli_free_result($medo1);
		?>
<form method="post"  id="forms" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">

<input hidden name='subid' value='<?php echo $row["id"]?>'>


<span>الأسم:</span>
<input <?php echo $dis; ?> type="text" name="Aname" value="<?php echo $row['na']; ?>">
<br>
<?php echo @$error['Aname']."<br>"; ?>
<br>

<span>رقم الجزء/الموسم:</span>
<input <?php echo $dis; ?> type="number" name="Snum" value="<?php echo $row['sn']; ?>">
<br>
<?php echo @$error['Snum']."<br>"; ?>
<br>



<span>رقم الحلقة:</span>
<input <?php echo $dis; ?> type="number" name="Enum" value="<?php echo $row['en']; ?>">
<br> 
<?php echo @$error['Enum']."<br>"; ?>
<br>



<span>رابط الصورة:</span>
<input <?php echo $dis; ?> type="text" name="imgu" value="<?php echo $row['img']; ?>">
<br>
<?php echo @$error['imgu']."<br>"; ?>
<br>


<span>الوصف:</span>
<textarea name="desc"><?php echo $row['des']; ?></textarea>
<br>
<?php echo @$error['desc']."<br>"; ?>
<br>


التصنيف:
<select name="cat">
  <option value="0">تصنيف الكلمة</option>
<?php
$i = 0;
@$ki = $medo->selecta('ca','cana');
while ($row2 = $medo->fassoc($ki)) {
  $i++;
    $selected= in_array($row2['cid'], $cats ) ? "selected" : "" ; 
  echo '<option '.$selected.' value="'.$row2['cid'].'">'.$row2['cana'].'</option>';
}
 ?>
</select><br>
<?php echo @$error['cat']."<br>"; ?>

تصنيفات أُخرى:
<div id="cats">
<?php
$i = 0;
$ki = $medo->selecta('ca','cana');
while ($row0 = $medo->fassoc($ki)) {
  $i++;
    @$Checked= in_array($row0['cid'], $cats ) ? "Checked" : "" ; 
  echo '<section><input '.$dis.' id="checkbox-1-'.$i.'" type="checkbox" name="cats[]" '.@$Checked.' value="'.$row0['cid'].'"><label for="checkbox-1-'.$i.'"></label>'.$row0['cana'].'</section> ';
}
 ?>
</div><br>
<?php echo @$error['cats']."<br>"; ?>
<br>

القسم:
<select name="kind">
  <option value="0">القسم</option>
<?php
$i = 0;
@$ki = $medo->selecta('ki','kana');
while ($row1 = $medo->fassoc($ki)) {
  $i++;
  $selected= $row1['kid'] === $row['ki'] ? "selected" : "" ; 
  echo '<option '.$selected.' value="'.$row1['kid'].'">'.$row1['kana'].'</option>';
}
 ?>
</select><br>
<?php echo @$error['kind']."<br>"; ?>

<br>
<br>

<span>رابط المنتدى:</span>
<input <?php echo $dis; ?> type="text" name="furl" value="<?php echo $row['furl']; ?>">
<br>
<?php echo @$error['furl']."<br>"; ?>
<br>


<span>رابط الأونلاين:</span>
<input <?php echo $dis; ?> type="text" name="ourl" value="<?php echo $row['ourl']; ?>">
<br>
<?php echo @$error['ourl']."<br>"; ?>
<br>


<input type="submit" name="subup" value="Update Subject">

</form>
		<?php
		}else{
		echo '<div id="error"><strong>عفوًا..</strong> و لكن الموضوع الذى تبحث عنه غير موجود</div>';
	}
}
##########################################################################################
elseif (@$_POST['subup']) {

#####POST#####
@$subid=$medo->safeput($_POST['subid']);
@$Aname=$medo->safeput($_POST['Aname']);
@$imgu=$medo->safeput($_POST['imgu']);
@$desc=$medo->safeput($_POST['desc']);
@$furl=$medo->safeput($_POST['furl']);
@$ourl=$medo->safeput($_POST['ourl']);

$date= date("d / m / Y ; h:i");


@$Snum=is_numeric($medo->safeput($_POST['Snum'])) ? $medo->safeput($_POST['Snum']) : $error['Snum']='Please Check Errors in Seasson number-Maybe Empty or UnAllowed Letters';
@$Enum=is_numeric($medo->safeput($_POST['Enum'])) ? $medo->safeput($_POST['Enum']) : $error['Enum']='Please Check Errors in Episode number-Maybe Empty or UnAllowed Letters';
@$kind=is_numeric($medo->safeput($_POST['kind'])) ? $medo->safeput($_POST['kind']) : $error['kind']='Please Check Errors in Kind-Maybe Empty or UnAllowed Letters';
@$cat=is_numeric($medo->safeput($_POST['cat'])) ? $medo->safeput($_POST['cat']) : $error['cat']='Please Check Errors in Cat-Maybe Empty or UnAllowed Letters';
#####POST#####

 $fields = array('Aname', 'Snum', 'Enum', 'desc','cat','kind');
 $urlsv = array('imgu', 'furl', 'ourl');

    foreach ($_POST as $key => $value) {
      if (empty($value) && in_array($key, $fields) === true || in_array($key, $fields) === true && !preg_match("/^([\x{0600}-\x{06EF}0-9a-zA-Z \/\\\'\"])+$/u",$value) ) {
       $error[$key] = 'Please Check Errors in '.$key.' -Maybe Empty or UnAllowed Letters';
      }
      if (empty($value) && in_array($key, $urlsv) || in_array($key, $urlsv) && filter_var($value, FILTER_VALIDATE_URL) === false) {
      $error[$key] = 'Please Check Errors in URL -Maybe Empty or UnAllowed Letters';
      }
    }

    $cats = $cat ." ; ";
    if(isset($_POST['cats'] )){
    foreach (@$_POST['cats'] as $key => $value) {
      if ( is_numeric($value) && $value != $cat ) {
        $cats = $cats ."". $medo->safeput($value) ." ; ";   
      }else {
        $error['cats'] = 'Please Check Errors in Category -Maybe Empty or Like First Category';
        $_POST['cats'][$key]= '';
      } 
    }
  }
 

  if(!isset($error)){
    if($medo->update("sub","na='$Aname', sn='$Snum', en='$Snum', img='$imgu', des='$desc', ca='$cats', ki='$kind', furl='$furl', ourl='$ourl'","id", $subid)){
            echo '<div id="good"><p><strong>أحسنت..</strong> تم إدخال البيانات بنجاح، جارى التحويل...</p></div>';
                echo "<script>setTimeout(\"location.href = 'sub.php';\",1500);</script>";
                $submit= 'disabled';
                }else{echo '<div id="error"><strong>عفوًا..</strong> حدث خطأ أثناء تنفيذ الاستعلام.. أعد المحاولة أو راسل مدير الموقع بالأمر</div>';}
          }else{
            echo '<div  id="error"><p><strong>عفوًا..</strong> يوجد خطأ فى البيانات، الرجاء التأكد منها...</p></div>';
            }
          

?>

<form method="post"  id="forms" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">

<input hidden name='subid' value='<?php echo $subid?>'>

<span>الأسم:</span>
<input type="text" name="Aname" value="<?php echo @htmlspecialchars($_POST['Aname']); ?>">
<br>
<?php echo @$error['Aname']."<br>"; ?>
<br>

<span>رقم الجزء/الموسم:</span>
<input type="number" name="Snum" value="<?php echo @htmlspecialchars($_POST['Snum']); ?>">
<br>
<?php echo @$error['Snum']."<br>"; ?>
<br>



<span>رقم الحلقة:</span>
<input type="number" name="Enum" value="<?php echo @htmlspecialchars($_POST['Enum']); ?>">
<br> 
<?php echo @$error['Enum']."<br>"; ?>
<br>



<span>رابط الصورة:</span>
<input type="text" name="imgu" value="<?php echo @htmlspecialchars($_POST['imgu']); ?>">
<br>
<?php echo @$error['imgu']."<br>"; ?>
<br>


<span>الوصف:</span>
<textarea   name="desc"><?php echo @htmlspecialchars($_POST['desc']); ?></textarea>
<br>
<?php echo @$error['desc']."<br>"; ?>
<br>


التصنيف:
<select name="cat">
  <option value="0">تصنيف الكلمة</option>
<?php
$i = 0;
@$ki = $medo->selecta('ca','cana');
while ($row = $medo->fassoc($ki)) {
  $i++;
    $selected=isset($_POST['cat']) && $row['cid'] == $_POST['cat'] ? "selected" : "" ; 
  echo '<option '.$selected.' value="'.$row['cid'].'">'.$row['cana'].'</option>';
}
 ?>
</select><br>
<?php echo @$error['cat']."<br>"; ?>

تصنيفات أُخرى:
<div id="cats">
<?php
$i = 0;
$ki = $medo->selecta('ca','cana');
while ($row = $medo->fassoc($ki)) {
  $i++;
    @$Checked=isset($_POST['cats']) && in_array($row['cid'], $_POST['cats'] ) ? "Checked" : "" ; 
  echo '<section><input id="checkbox-1-'.$i.'" type="checkbox" name="cats[]" '.@$Checked.' value="'.$row['cid'].'"><label for="checkbox-1-'.$i.'"></label>'.$row['cana'].'</section> ';
}
 ?>
</div><br>
<?php echo @$error['cats']."<br>"; ?>
<br>

القسم:
<select name="kind">
  <option value="0">القسم</option>
<?php
$i = 0;
@$ki = $medo->selecta('ki','kana');
while ($row = $medo->fassoc($ki)) {
  $i++;
  $selected=isset($_POST['kind']) && $row['kid'] == $medo->safeput($_POST['kind']) ? "selected" : "" ; 
  echo '<option '.$selected.' value="'.$row['kid'].'">'.$row['kana'].'</option>';
}
 ?>
</select><br>
<?php echo @$error['kind']."<br>"; ?>

<br>
<br>

<span>رابط المنتدى:</span>
<input type="text" name="furl" value="<?php echo @htmlspecialchars($_POST['furl']); ?>">
<br>
<?php echo @$error['furl']."<br>"; ?>
<br>


<span>رابط الأونلاين:</span>
<input type="text" name="ourl" value="<?php echo @htmlspecialchars($_POST['ourl']); ?>">
<br>
<?php echo @$error['ourl']."<br>"; ?>
<br>


<?php
echo  '<br><input '.$submit.' type="submit" name="subup" value="Update Subject"></form>';
	
	}else{echo '<div  id="error"><p><strong>عفوًا..</strong> لم يتم اختيار أى إجراء</p></div>';}

include "footer.php";
?>
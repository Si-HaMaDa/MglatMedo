<?php
include "header.php";
include "right.php";
$medo= new medo();
$sbffm="||.s.b. .f.m.||";
$dis = "disabled";
#####
if (@$_POST['subdel']) {
	@$subid=$medo->safeput($_POST['subid']);
	if($medo->delete('sub','id',$subid)){
	echo '<div id="good"><strong>حسنًا..</strong> تم حذف البيانات بنجاح</div>';
	echo "<script>setTimeout(\"location.href = 'sub.php';\",1500);</script>";
	}else{echo '<div id="error"><strong>عفوًا..</strong> حدث خطأ أثناء تنفيذ الاستعلام.. أعد المحاولة أو راسل مدير الموقع بالأمر</div>';}
}
#####
elseif (@$_POST['subno']) {
	header ("location: sub.php");
}
#####
elseif (@$_GET['action'] == 'delete') {
	$eid= isset($_GET['num']) ? intval($_GET['num']) : "" ;
	$medo1 = $medo->selectw('sub','id',$eid);
	if (mysqli_num_rows($medo1) > 0 ) {
	$row = $medo->fassoc($medo1);
	$cats = explode(" ; ", $row['ca']);
		mysqli_free_result($medo1);
		?>
		<div id="error">هل أنت متأكد من حذف هذه البيانات؟</div>
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
<textarea disabled name="desc"><?php echo $row['des']; ?></textarea>
<br>
<?php echo @$error['desc']."<br>"; ?>
<br>


التصنيف:
<select disabled name="cat">
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

النوع:
<select disabled name="kind">
  <option value="0">النوع</option>
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


<input id="yes" type="submit" name="subdel" value="تأكيد"><input id="no" type="submit" name="subno" value="إلغاء">

</form>

<?php		}else{
		echo '<div id="error"><strong>عفوًا..</strong> و لكن الموضوع الذى تبحث عنه غير موجود</div>';
	}
}
#####
else{echo '<div  id="error"><p><strong>عفوًا..</strong> لم يتم اختيار أى إجراء</p></div>';}

include "footer.php";
?>
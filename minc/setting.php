<?php
include "header.php";
include "right.php";
$medo = new medo();

@$sna=$medo->safeput($_POST['sna']);
@$sma=$medo->safeput($_POST['sma']);
@$surl=$medo->safeput($_POST['surl']);
@$sdes=$medo->safeput($_POST['sdes']);
@$skw=$medo->safeput($_POST['skw']);
@$sri=$medo->safeput($_POST['sri']);
@$scon= (int) $medo->safeput($_POST['scon']);
@$scm=$medo->safeput($_POST['scm']);


if(isset($_POST['subup'])){

foreach ($_POST as $key => $value) {
      if (empty($value) || !preg_match("/^([\x{0600}-\x{06EF}0-9a-zA-Z-_ @;.,'])+$/u",$value) ) {
       $error[$key] = 'Please Check Errors in Filed -Maybe Empty or UnAllowed Letters';
      }
    }

if (htmlspecialchars($_POST['ssp']) === "on") {
  $sspee = (int) htmlspecialchars($_POST['sspe']);
} elseif (htmlspecialchars($_POST['ssp']) === "off") {
  $sspee = 0;
}

if(!isset($error)){
    if($medo->update("sett"," sna='$sna' ,sma=' $sma' ,surl='$surl' ,sdes='$sdes' ,skw='$skw', sri='$sri', scon='$scon', scm='$scm', sspe='$sspee' ",'sid',1) ){
            echo '<div id="good"><p><strong>أحسنت..</strong> تم إدخال البيانات بنجاح، جارى التحويل...</p></div>';
                echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
                $submit= 'disabled';
                }else{echo '<div id="error"><strong>عفوًا..</strong> حدث خطأ أثناء تنفيذ الاستعلام.. أعد المحاولة أو راسل مدير الموقع بالأمر</div>';}
          }else{
            echo '<div  id="error"><p><strong>عفوًا..</strong> يوجد خطأ فى البيانات، الرجاء التأكد منها...</p></div>';
            }

$on = htmlspecialchars($_POST['ssp']) === "on" ? "checked" : "" ;
$off = htmlspecialchars($_POST['ssp']) === "off" ? "checked" : "" ;
$offf = htmlspecialchars($_POST['ssp']) === "off" ? "disabled" : "" ;


echo '
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<span>إسم الموقع:</span>
<input type="text" name="sna" value="'.@htmlspecialchars($_POST['sna']).'">
<br>
<br>
<hr>
<br>

<span>بريد الموقع:</span>
<input type="text" name="sma" value="'.@htmlspecialchars($_POST['sma']).'">
<br>
<br>
<hr>
<br>

<span>عنوان الموقع:</span>
<input type="text" name="surl" value="'.@htmlspecialchars($_POST['surl']).'">
<br>
<br>
<hr>
<br>

<span>وصف الموقع:</span>
<textarea name="sdes">'.@htmlspecialchars($_POST['sdes']).'</textarea>
<br>
<br>
<hr>
<br>

<span>الكلمات الدلالية:</span>
<textarea name="skw">'.@htmlspecialchars($_POST['skw']).'</textarea>
<br>
<br>
<hr>
<br>

<span>حقوق الموقع:</span>
<input type="text" name="sri" value="'.@htmlspecialchars($_POST['sri']).'">
<br>
<br>
<hr>
<br>

<span>حالة الموقع:</span>
<select name="scon">
  ';
  if (@htmlspecialchars($_POST['scon']) == 1) {
    echo '
<option value="0">حالة الموقع</option>
<option selected value="1">متاح</option>
<option value="2">مغلق</option>
    ';
  }elseif (@htmlspecialchars($_POST['scon']) == 2) {
    echo '
<option value="0">حالة الموقع</option>
<option value="1">متاح</option>
<option selected value="2">مغلق</option>
    ';
  }else{
    echo '
<option value="0">حالة الموقع</option>
<option value="1">متاح</option>
<option value="2">مغلق</option>
    ';
  }
echo '
</select>
<br>
<br>

<span>رسالة او صفحة الاغلاق:</span>
<textarea name="scm">'.@htmlspecialchars($_POST['scm']).'</textarea>
<br>
<br>
<hr>
<br>


<span>المواضيع المميزة:</span>
<input '.$on.' onclick="lol(\'on\')" name="ssp" type="radio" value="on">ON</input>
<br>
<input '.$off.' onclick="lol(\'off\')" name="ssp" type="radio" value="off">OFF</input>
<br>
<br>

<span>عدد المواضيع المميزة:</span>
<input '.$offf.' id="sspe" type="number" name="sspe" value="'.@htmlspecialchars($_POST['sspe']).'">
<br>
<br>


<input '.$submit.' type="submit" name="subup" value="تحديث إعدادات الموقع">

</form>
';
##################################
}else{
##################################
$medo0 = $medo->selecta('sett','') ;
$row = $medo->fassoc($medo0);

echo '
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<span>إسم الموقع:</span>
<input type="text" name="sna" value="'.$row['sna'].'">
<br>
<br>
<hr>
<br>

<span>بريد الموقع:</span>
<input type="text" name="sma" value="'.$row['sma'].'">
<br>
<br>
<hr>
<br>

<span>عنوان الموقع:</span>
<input type="text" name="surl" value="'.$row['surl'].'">
<br>
<br>
<hr>
<br>

<span>وصف الموقع:</span>
<textarea name="sdes">'.$row['sdes'].'</textarea>
<br>
<br>
<hr>
<br>

<span>الكلمات الدلالية:</span>
<textarea name="skw">'.$row['skw'].'</textarea>
<br>
<br>
<hr>
<br>

<span>حقوق الموقع:</span>
<input type="text" name="sri" value="'.$row['sri'].'">
<br>
<br>
<hr>
<br>

<span>حالة الموقع:</span>
<select name="scon">
  ';
  if ($row['scon'] == 1) {
    echo '
<option value="0">حالة الموقع</option>
<option selected value="1">متاح</option>
<option value="2">مغلق</option>
    ';
  }elseif ($row['scon'] == 2) {
    echo '
<option value="0">حالة الموقع</option>
<option value="1">متاح</option>
<option selected value="2">مغلق</option>
    ';
  }else{
    echo '
<option value="0">حالة الموقع</option>
<option value="1">متاح</option>
<option value="2">مغلق</option>
    ';
  }
echo '
</select>
<br>
<br>

<span>رسالة او صفحة الاغلاق:</span>
<textarea name="scm">'.$row['scm'].'</textarea>
<br>
<br>
<hr>
<br>';

if ($row['sspe'] == 0 ) {
  $off0 = "checked";
  $off00 = "disabled";
} elseif ($row['sspe'] > 0 ) {
  $on0 = "checked";
}

echo '<span>المواضيع المميزة:</span>
<input '.@$on0.' onclick="lol(\'on\')" name="ssp" type="radio" value="on">ON</input>
<br>
<input '.@$off0.' onclick="lol(\'off\')" name="ssp" type="radio" value="off">OFF</input>
<br>
<br>

<span>عدد المواضيع المميزة:</span>
<input '.@$off00.' id="sspe" type="number" name="sspe" value="'.$row['sspe'].'">
<br>
<br>


<input type="submit" name="subup" value="تحديث إعدادات الموقع">

</form>
';
}
echo '
<script type="text/javascript">
  function lol(lol0) {
    if (lol0 === "off") {
      document.getElementById(\'sspe\').disabled = "disabled";
      document.getElementById(\'sspe\').value = "0";
    } else if (lol0 === "on") {
      document.getElementById(\'sspe\').disabled = "";
      document.getElementById(\'sspe\').value = "1";
    }
  }
</script>';

include "footer.php";
?>
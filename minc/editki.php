<?php
include "header.php";
include "right.php";
$medo= new medo();
#####
if (@$_GET['action'] == 'edit') {
	$eid= isset($_GET['num']) ? intval($_GET['num']) : "" ;
	$medo1 = $medo->selectw('ki','kid',$eid);
	$row = $medo->fassoc($medo1);
	if (mysqli_num_rows($medo1) > 0 ) {	
		mysqli_free_result($medo1);
	echo '
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<input hidden name="kindid"   value="'.$eid.'">
<span>إسم القسم عربي:</span>
<input type="text" name="kindA" value="'.$row['kana'].'">
<br>
<br>
<span>إسم القسم انجليزى:</span>
<input type="text" name="kindE" value="'.$row['kena'].'">
<br>
<br>
<input type="submit" name="subup" value="Update Kind">
</form>
	';
	}else{
		echo '<div id="error"><strong>عفوًا..</strong> و لكن القسم الذى تبحث عنه غير موجود</div>';
	}
}
#####
elseif (@$_GET['action'] == 'delete') {
	$eid= isset($_GET['num']) ? intval($_GET['num']) : "" ;
	$medo1 = $medo->selectw('ki','kid',$eid);
	$row = $medo->fassoc($medo1);
	if (mysqli_num_rows($medo1) > 0 ) {
		mysqli_free_result($medo1);
		echo '
		<div id="error">هل أنت متأكد من حذف هذه البيانات؟</div>
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<input hidden name="kindid"   value="'.$eid.'">
<span>إسم القسم عربي:</span>
<input disabled type="text" name="kindA" value="'.$row['kana'].'">
<br>
<br>
<span>إسم القسم انجليزى:</span>
<input disabled type="text" name="kindE" value="'.$row['kena'].'">
<br>
<br>
<input id="yes" type="submit" name="subdel" value="تأكيد"><input id="no" type="submit" name="subno" value="إلغاء">
</form>
	';
		}else{
		echo '<div id="error"><strong>عفوًا..</strong> و لكن القسم الذى تبحث عنه غير موجود</div>';
	}
}
#####
elseif (@$_POST['subdel']) {
	@$kindid=$medo->safeput($_POST['kindid']);
	if($medo->delete('ki','kid',$kindid)){
	echo '<div id="good"><strong>حسنًا..</strong> تم حذف البيانات بنجاح</div>';
	echo "<script>setTimeout(\"location.href = 'kind.php';\",1500);</script>";
	}else{echo '<div id="error"><strong>عفوًا..</strong> حدث خطأ أثناء تنفيذ الاستعلام.. أعد المحاولة أو راسل مدير الموقع بالأمر</div>';}
}
#####
elseif (@$_POST['subno']) {
	header ("location: kind.php");
}
#####
elseif (@$_POST['subup']) {

@$kindid=$medo->safeput($_POST['kindid']);
@$kindA=$medo->safeput($_POST['kindA']);
@$kindE=$medo->safeput($_POST['kindE']);

if (empty($kindA) || !preg_match("/^[\x{0600}-\x{06EF}0-9 \/\\\']+$/u",$kindA) ) {
       $errorA = 'Please Check Errors in Cat - Maybe Empty or UnAllowed Letters - Arabic only';
    }
    if (empty($kindE) || !preg_match("/^[a-zA-Z0-9 \/\\\']+$/u",$kindE) ) {
    	$errorE = 'Please Check Errors in Cat - Maybe Empty or UnAllowed Letters - English only';
    }

if(!isset($errorA) && !isset($errorE)){
		if($medo->update("ki","kana='$kindA',kena='$kindE'", 'kid',$kindid)){
	        	echo '<div id="good"><p><strong>أحسنت..</strong> تم تحديث البيانات بنجاح، جارى التحويل...</p></div>';
	        	echo '
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<input hidden name="kindid"   value="'.@htmlspecialchars($_POST["kindid"]).'">
<span>إسم القسم عربي:</span>
<input disabled type="text" name="kindA" value="'.@htmlspecialchars($_POST["kindA"]).'">
<br>
<br>
<span>إسم القسم انجليزى:</span>
<input disabled type="text" name="kindE" value="'.@htmlspecialchars($_POST["kindE"]).'">
<br>
<br>
</form>
	';
	        	echo "<script>setTimeout(\"location.href = 'kind.php';\",1500);</script>";
	        	}else{echo '<div id="error"><strong>عفوًا..</strong> حدث خطأ أثناء تنفيذ الاستعلام.. أعد المحاولة أو راسل مدير الموقع بالأمر</div>';}
	        }else{
            echo '<div  id="error"><p><strong>عفوًا..</strong> يوجد خطأ فى البيانات، الرجاء التأكد منها...</p></div>';
            echo '
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<input hidden name="kindid"   value="'.@htmlspecialchars($_POST["kindid"]).'">
<span>إسم القسم عربي:</span>
<input type="text" name="kindA" value="'.@htmlspecialchars($_POST["kindA"]).'">
<br>
'.@$errorA."<br>" .'
<br>
<span>إسم القسم انجليزى:</span>
<input type="text" name="kindE" value="'.@htmlspecialchars($_POST["kindE"]).'">
<br>
'. @$errorE."<br>" .'
<br>
<input type="submit" name="subup" value="Update kind">
</form>
	';
          }
}
#####
else{echo '<div  id="error"><p><strong>عفوًا..</strong> لم يتم اختيار أى إجراء</p></div>';}

include "footer.php";
?>
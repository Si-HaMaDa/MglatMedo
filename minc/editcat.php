<?php
include "header.php";
include "right.php";
$medo= new medo();
#####
if (@$_GET['action'] == 'edit') {
	$eid= isset($_GET['num']) ? intval($_GET['num']) : "" ;
	$medo1 = $medo->selectw('ca','cid',$eid);
	$row = $medo->fassoc($medo1);
	if (mysqli_num_rows($medo1) > 0 ) {	
		mysqli_free_result($medo1);
	echo '
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<input hidden name="catid"   value="'.$eid.'">
<span>إسم التصنيف عربي:</span>
<input type="text" name="catA" value="'.$row['cana'].'">
<br>
<br>
<span>إسم التصنيف انجليزى:</span>
<input type="text" name="catE" value="'.$row['cena'].'">
<br>
<br>
<input type="submit" name="subup" value="Update Category">
</form>
	';
	}else{
		echo '<div id="error"><strong>عفوًا..</strong> و لكن التصنيف الذى تبحث عنه غير موجود</div>';
	}
}
#####
elseif (@$_GET['action'] == 'delete') {
	$eid= isset($_GET['num']) ? intval($_GET['num']) : "" ;
	$medo1 = $medo->selectw('ca','cid',$eid);
	$row = $medo->fassoc($medo1);
	if (mysqli_num_rows($medo1) > 0 ) {
		mysqli_free_result($medo1);
		echo '
		<div id="error">هل أنت متأكد من حذف هذه البيانات؟</div>
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<input hidden name="catid"   value="'.$eid.'">
<span>إسم التصنيف عربي:</span>
<input disabled type="text" name="catA" value="'.$row['cana'].'">
<br>
<br>
<span>إسم التصنيف انجليزى:</span>
<input disabled type="text" name="catE" value="'.$row['cena'].'">
<br>
<br>
<input id="yes" type="submit" name="subdel" value="تأكيد"><input id="no" type="submit" name="subno" value="إلغاء">
</form>
	';
		}else{
		echo '<div id="error"><strong>عفوًا..</strong> و لكن التصنيف الذى تبحث عنه غير موجود</div>';
	}
}
#####
elseif (@$_POST['subdel']) {
	@$catid=$medo->safeput($_POST['catid']);
	if($medo->delete('ca','cid',$catid)){
	echo '<div id="good"><strong>حسنًا..</strong> تم حذف البيانات بنجاح</div>';
	echo "<script>setTimeout(\"location.href = 'cat.php';\",1500);</script>";
	}else{echo '<div id="error"><strong>عفوًا..</strong> حدث خطأ أثناء تنفيذ الاستعلام.. أعد المحاولة أو راسل مدير الموقع بالأمر</div>';}
}
#####
elseif (@$_POST['subno']) {
	header ("location: cat.php");
}
#####
elseif (@$_POST['subup']) {

@$catid=$medo->safeput($_POST['catid']);
@$catA=$medo->safeput($_POST['catA']);
@$catE=$medo->safeput($_POST['catE']);

if (empty($catA) || !preg_match("/^[\x{0600}-\x{06EF}0-9 \/\\\']+$/u",$catA) ) {
       $errorA = 'Please Check Errors in Cat - Maybe Empty or UnAllowed Letters - Arabic only';
    }
    if (empty($catE) || !preg_match("/^[a-zA-Z0-9 \/\\\']+$/u",$catE) ) {
    	$errorE = 'Please Check Errors in Cat - Maybe Empty or UnAllowed Letters - English only';
    }

if(!isset($errorA) && !isset($errorE)){
		if($medo->update("ca","cana='$catA',cena='$catE'", 'cid',$catid)){
	        	echo '<div id="good"><p><strong>أحسنت..</strong> تم تحديث البيانات بنجاح، جارى التحويل...</p></div>';
	        	echo '
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<input hidden name="catid"   value="'.@htmlspecialchars($_POST["catid"]).'">
<span>إسم التصنيف عربي:</span>
<input disabled type="text" name="catA" value="'.@htmlspecialchars($_POST["catA"]).'">
<br>
<br>
<span>إسم التصنيف انجليزى:</span>
<input disabled type="text" name="catE" value="'.@htmlspecialchars($_POST["catE"]).'">
<br>
<br>
</form>
	';
	        	echo "<script>setTimeout(\"location.href = 'cat.php';\",1500);</script>";
	        }else{echo '<div id="error"><strong>عفوًا..</strong> حدث خطأ أثناء تنفيذ الاستعلام.. أعد المحاولة أو راسل مدير الموقع بالأمر</div>';}
	        }else{
            echo '<div  id="error"><p><strong>عفوًا..</strong> يوجد خطأ فى البيانات، الرجاء التأكد منها...</p></div>';
            echo '
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<input hidden name="catid"   value="'.@htmlspecialchars($_POST["catid"]).'">
<span>إسم التصنيف عربي:</span>
<input type="text" name="catA" value="'.@htmlspecialchars($_POST["catA"]).'">
<br>
'.@$errorA."<br>" .'
<br>
<span>إسم التصنيف انجليزى:</span>
<input type="text" name="catE" value="'.@htmlspecialchars($_POST["catE"]).'">
<br>
'. @$errorE."<br>" .'
<br>
<input type="submit" name="subup" value="Update Category">
</form>
	';
          }
}
#####
else{echo '<div  id="error"><p><strong>عفوًا..</strong> لم يتم اختيار أى إجراء</p></div>';}

include "footer.php";
?>
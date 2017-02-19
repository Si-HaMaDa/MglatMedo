<?php
include "header.php";
include "right.php";

if(isset($_POST['sub'])){

$medo = new medo();

@$kindA=$medo->safeput($_POST['kindA']);
@$kindE=$medo->safeput($_POST['kindE']);

   if (empty($kindA) || !preg_match("/^[\x{0600}-\x{06EF}0-9 \/\\\']+$/u",$kindA) ) {
       $errorA = 'Please Check Errors in Cat - Maybe Empty or UnAllowed Letters - Arabic only';
    }
    if (empty($kindE) || !preg_match("/^[a-zA-Z0-9 \/\\\']+$/u",$kindE) ) {
    	$errorE = 'Please Check Errors in Cat - Maybe Empty or UnAllowed Letters - English only';
    }

if(!isset($errorA) && !isset($errorE)){
		$m=new medo();
		$m->insert("ki","kana,kena",  ("$kindA',' $kindE"));
	        	echo '<div id="good"><p><strong>أحسنت..</strong> تم إدخال البيانات بنجاح، جارى التحويل...</p></div>';
                  echo '
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<span>إسم القسم عربي:</span>
<input disabled type="text" name="kindA" value="'. @htmlspecialchars($_POST['kindA']).'">
<br>
<br>
<span>إسم القسم انجليزى:</span>
<input disabled type="text" name="kindE" value="'. @htmlspecialchars($_POST['kindE']).'">
<br>
<br>
</form>
                 ';
	        	echo "<script>setTimeout(\"location.href = 'kind.php';\",1500);</script>";
	        }else{
            echo '<div  id="error"><p><strong>عفوًا..</strong> يوجد خطأ فى البيانات، الرجاء التأكد منها...</p></div>';
            echo '
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<span>إسم القسم عربي:</span>
<input type="text" name="kindA" value="'. @htmlspecialchars($_POST['kindA']).'">
<br>
'.@$errorA."<br>".'
<br>
<span>إسم القسم انجليزى:</span>
<input type="text" name="kindE" value="'. @htmlspecialchars($_POST['kindE']).'">
<br>
'.@$errorE."<br>".'
<br>
<input type="submit" name="sub" value="Add Kind">
</form>
            ';
          }

}else{
  echo '
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<span>إسم القسم عربي:</span>
<input type="text" name="kindA" value="'. @htmlspecialchars($_POST['kindA']).'">
<br>
'.@$errorA."<br>".'
<br>
<span>إسم القسم انجليزى:</span>
<input type="text" name="kindE" value="'. @htmlspecialchars($_POST['kindE']).'">
<br>
'.@$errorE."<br>".'
<br>
<input type="submit" name="sub" value="Add Kind">
</form>
  ';
}

include "footer.php";
?>
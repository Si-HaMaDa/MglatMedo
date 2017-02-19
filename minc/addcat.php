<?php
include "header.php";
include "right.php";

if(isset($_POST['sub'])){

$medo = new medo();

@$catA=$medo->safeput($_POST['catA']);
@$catE=$medo->safeput($_POST['catE']);

   if (empty($catA) || !preg_match("/^[\x{0600}-\x{06EF}0-9 \/\\\']+$/u",$catA) ) {
       $errorA = 'Please Check Errors in Cat - Maybe Empty or UnAllowed Letters - Arabic only';
    }//"/[^a-zA-Z0-9 '-]+/"
    if (empty($catE) || !preg_match("/^[a-zA-Z0-9 \/\\\']+$/u",$catE) ) {
      echo $catE;
    	$errorE = 'Please Check Errors in Cat - Maybe Empty or UnAllowed Letters - English only';
    }

if(!isset($errorA) && !isset($errorE)){
		$m=new medo();
		$m->insert("ca","cana,cena",  ("$catA',' $catE"));
	        	echo '<div id="good"><p><strong>أحسنت..</strong> تم إدخال البيانات بنجاح، جارى التحويل...</p></div>';
                 echo '
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
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
	        }else{
            echo '<div  id="error"><p><strong>عفوًا..</strong> يوجد خطأ فى البيانات، الرجاء التأكد منها...</p></div>';
              echo '
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<span>إسم التصنيف عربي:</span>
<input type="text" name="catA" value="'.@htmlspecialchars($_POST["catA"]).'">
<br>
'.@$errorA.'<br>
<br>
<span>إسم التصنيف انجليزى:</span>
<input type="text" name="catE" value="'.@htmlspecialchars($_POST["catE"]).'">
<br>
'.@$errorE.'<br>
<br>
<input type="submit" name="sub" value="Add Category">
</form>
';
          }

}else{
  echo '
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<span>إسم التصنيف عربي:</span>
<input type="text" name="catA" value="'.@htmlspecialchars($_POST["catA"]).'">
<br>
<br>
<span>إسم التصنيف انجليزى:</span>
<input type="text" name="catE" value="'.@htmlspecialchars($_POST["catE"]).'">
<br>
<br>
<input type="submit" name="sub" value="Add Category">
</form>
';
}

include "footer.php";
?>
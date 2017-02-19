<?php
include('../bfg/fg.php');

$medo= new medo();

$searchw = $medo->safeput($_GET['co']);

if (empty($searchw) || !preg_match("/^([\x{0600}-\x{06EF}0-9a-zA-Z \/\\\'\"])+$/u",$searchw) ) {
	echo '<script></script>';
	$Error = 1;
}

if (@!$Error){
$c = 0 ;
@$medo0 = $medo->limit('sub',0,999999999,'id DESC',"na LIKE '%$searchw%' OR des LIKE '%$searchw%'");
if (mysqli_num_rows($medo0) > 0) {
	$categorys = $medo->selecta('ca','');
	$c = 0;
	while ($row = $medo->fassoc($categorys)) {
		$category[$row['cid']] = $row['cana'];
		$c++;
	}
	$kinds = $medo->selecta('ki','');
	$c = 0;
	while ($row = $medo->fassoc($kinds)) {
		$kind[$row['kid']] = $row['kana'];
		$c++;
	}
	$c = 0 ;
	while ($row = $medo->fassoc($medo0)) {
	  $c++;
	  $cat = explode(" ; ", $row['ca'], -1);
	  $i0= 0;
	  include "template/sub.php";
	}
}else{ $Error = 2;}
}

if (@$Error === 1) {
?>
<div id="popup1" class="overlay">
	<div class="popup">
		<a class="close" href="#">&times;</a>
		<h3><i class="fa fa-exclamation-circle" aria-hidden="true"></i>
 عفوًا.. خطأ</h3>
		<div class="content">
			عذرًا.. يبدو أن الكلمة التى تحاول البحث بها غير مقبولة أو أنه لا يوجد كلمات للبحث بها..
			<br>
			يمكنك مراسلة مدير الموقع بالأمر.
		</div>
	</div>
</div>
<a id="popupactive" hidden href="#popup1"></a>
<div id="redir">
	<span>
		<div class="content">
			عذرًا.. يبدو أن الكلمة التى تحاول البحث بها غير مقبولة أو أنه لا يوجد كلمات للبحث بها..
			<br>
			يمكنك مراسلة مدير الموقع بالأمر.
		</div>
	</span>
</div>
<?php } elseif (@$Error === 2) {
?>
<div id="popup1" class="overlay">
	<div class="popup">
		<a class="close" href="#">&times;</a>
		<h3><i class="fa fa-exclamation-circle" aria-hidden="true"></i>
 عفوًا.. خطأ</h3>
		<div class="content">
			عذرًا.. يبدو أنه لا توجد نتائج للكلمة التى تحاول البحث بها..
		</div>
	</div>
</div>
<a id="popupactive" hidden href="#popup1"></a>
<div id="redir">
	<span>
		<div class="content">
			عذرًا.. يبدو أنه لا توجد نتائج للكلمة التى تحاول البحث بها..
		</div>
	</span>
</div>
<?php } ?>
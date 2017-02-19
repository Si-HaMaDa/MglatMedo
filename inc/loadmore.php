<?php
include('../bfg/fg.php');
$medo= new medo();
if (!is_numeric($_GET['co'])){
	die('There is Error');
}else {
	$cou = (int)($_GET['co']);
}
$startpoint = ($cou * 12);
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
@$medo0 = $medo->limit('sub',$startpoint,'12','id DESC');
while ($row = $medo->fassoc($medo0)) {
  $c++;
  $cat = explode(" ; ", $row['ca'], -1);
  $i0= 0;
  include "template/sub.php";
}
// echo "</div>";
?>
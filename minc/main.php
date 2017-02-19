<?php
include "header.php";
include "right.php";

$medo= new medo();
// $testArr = array[];
// base64_encode(serialize($testArr));
// $testArr = unserialize(base64_decode($string));
@$medo0 = $medo->selecta('sub');
@$rowsnum= $medo->num($medo0);

@$medo1 = $medo->selecta('ca');
$rowsnum0= $medo->num($medo1);

@$medo2 = $medo->selecta('ki');
$rowsnum1= $medo->num($medo2);

$medo3 = $medo->selecta('sett','') ;
$sett = $medo->fassoc($medo3);
$scon = $sett['scon'] == 1 ? 'متاح' : 'مغلق' ;
?>

<div  id="hi">مرحبًا بك فى لوحة التحكم</div>

<div id="rowsnum">حالة الموقع: <?php echo $scon; ?></div>

<div id="rowsnum">حقوق الموقع: <?php echo $sett['sri']; ?></div>

<div id="rowsnum">عدد المواضيع: <?php echo $rowsnum; ?></div>

<div id="rowsnum">عدد التصنيفات: <?php echo $rowsnum0; ?></div>

<div id="rowsnum">عدد الأنواع: <?php echo $rowsnum1; ?></div>



<?php
include "footer.php";
?>
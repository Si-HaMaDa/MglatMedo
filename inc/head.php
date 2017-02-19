<!DOCTYPE html>
<html dir="rtl">
<head>

<?php
include('./bfg/fg.php');
$medo = new medo();
$sett=$medo->selecta('sett','') ;
$sett0 = $medo->fassoc($sett);

echo '
	<title>'.$sett0['sna'].'</title>
	<meta NAME="description" CONTENT="'.$sett0['sdes'].'">
	<meta NAME="keywords" CONTENT="'.$sett0['skw'].'">
	<meta NAME="author" CONTENT="'.$sett0['sri'].','.$sett0['surl'].'">
	<meta name="copyright" CONTENT="'.$sett0['sri'].'">
	<meta name="robots" content="index, follow">
	<meta name="revisit-after" content="7 days">
	<!-- mean , معنى , meaning of -->
';

echo '
<link rel="shortcut icon" href="'.SITEROOT.'style/img/im_here.jpg" type="image/jpg">
<link rel="stylesheet" href="'.SITEROOT.'style/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="'.SITEROOT.'style/style-copy.css">
';
?>
<?php

// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection
require_once("config/db.php");

// load the login class
require_once("classes/Login.php");

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() != true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    //include("views/logged_in.php");
    header("location:index.php");
    exit("Try another One");
}

include('../bfg/fg.php');

?>


<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
 <title>لوحة التحكم</title>
 <link rel="stylesheet" type="text/css" href="style/style.css">

</head>
<body>

<div class="clear"></div>

<!-- header -->
<div id="header">


	<ul class="right">
		<li><a href="index.php">الصفحة الرئيسية</a></li>|
		<li><a href="setting.php">إعدادات الموقع</a></li>|
		<li><a href="#">أخرى</a></li>|
		<li><?php echo $_SESSION['user_name']; ?></li>
	</ul>
	<ul class="left">
		<li><a href="index.php?logout">تسجيل خروج</a></li>|
		<li><a href="../">رئيسية الموقع</a></li>
	</ul>


</div>

<div class="clear"></div>

<!-- main div for cp -->
<div id="main">


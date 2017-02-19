


<!-- right panel -->
<div id="right">
<div id="ht">قائمة التحكم</div>
	<ul>
		<li><a href="index.php">الرئيسية</a></li>
		<li><a href="setting.php">الإعدادات</a></li>
		<li><a href="addsub.php">إضافة موضوع</a></li>
		<li><a href="sub.php">الموضوعات</a></li>
		<li><a href="cat.php">التصنيفات</a></li>
		<li><a href="kind.php">الأنواع</a></li>
		<?php
		 if ($_SESSION['user_level'] === 'iu5s8ef' || $_SESSION['user_level'] === 'kf8ir21' ) {
			echo '<li><a href="users.php">الأعضاء</a></li>';
		} ?>
	</ul>

</div>


<!-- left panel -->
<div id="left">
<div id="panles">


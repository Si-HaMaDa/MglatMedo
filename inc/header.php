
</head>

<?php
if ($sett0['scon'] == 2 ) {
	echo "<div>".$sett0['scm']."</div>";
	exit();
	echo "<div></div> ";
}

$last = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '' ;

?>


<body>

<div id="main">
<div id="header">
	<div id="logo">
		<img alt="Ainme-Storm" src="<?php echo SITEROOT; ?>style/img/18jehT5.jpg">
	</div>

	<div id="nav">
		<ul>
			<li><a href="<?php echo SITEROOT; ?>"><i class="fa fa-home" aria-hidden="true"></i>  الرئيسية  </a></li>
			<li><a href="javascript:;"><i class="fa fa-reorder"></i>  المنتدى  </a></li>
			<li><a href="javascript:kinds();"><i class="fa fa-list"></i>  الأقسام  </a></li>
			<li><a href="javascript:cats();"><i class="fa fa-list"></i>  التصنيفات  </a></li>
			<li><a href="javascript:;"><i class="fa fa-send"></i>  إتصل بنا  </a></li>
		</ul>

		<form id="search" onsubmit="loadsearch(this.getElementsByTagName('input')[0].value); return false">
			<span><input type="text" placeholder="البحث..." name="search"><input id="img" type="image" src="<?php echo SITEROOT; ?>style/img/search.png" alt="Submit Form"></span>
		</form>
	</div>

</div>
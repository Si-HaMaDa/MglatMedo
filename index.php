<?php
include "inc/head.php";

$medo= new medo();

@$medo0 = $medo->selecta('sub');

// $rowsnum= $medo->num($medo0);
$perpage = 12;
// $pagesnum = ceil($rowsnum/$perpage);
// $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);  
// $page = ($page == 0 ? 1 : $page);  
// if ($page > $pagesnum || $page < 0) {$page = 1;}
// $startpoint = ($page * $perpage) - $perpage; 
$startpoint = 0; 



include "inc/header.php";
?>





<div id="mid">

<?php if ($sett0['sspe'] == 1) { ?>

<div class="sub-f" id="special" ></div>

<?php } ?>

<?php
echo '<div id="cats">';
$categorys = $medo->selecta('ca','');
$c = 0;
while ($row = $medo->fassoc($categorys)) {
	$category[$row['cid']] = $row['cana'];
	echo '<section><input id="checkbox-1-'.$c.'" type="checkbox" name="cats[]" value="'.$row['cid'].'"><label for="checkbox-1-'.$c.'"></label>'.$row['cana'].'</section>';
	$c++;
}
echo '<button onclick="loadcats()" class="loadsty" id="loadc"><i class="fa fa-search-plus" aria-hidden="true"></i> Start Looking</button></div>';

echo '<div id="kinds"><select id="kind" name="kind">
  <option value="" disabled selected>القسم</option>';
$kinds = $medo->selecta('ki','');
$c = 0;
while ($row = $medo->fassoc($kinds)) {
	$kind[$row['kid']] = $row['kana'];
	echo '<option value="'.$row['kid'].'">'.$row['kana'].'</option>';
	$c++;
}
echo '</select><button onclick="loadkind()" class="loadsty" id="loadk"><i class="fa fa-search-plus" aria-hidden="true"></i> Start Looking</button></div>';
?>


<div class="sub-f" id="blal">
		
		<div id="title">
			<img src="<?php echo SITEROOT; ?>style/img/time.png">
			<span>أحدث المواضيع</span>
		</div>

		<br/>
<div>
<?php

$c = 0 ;
@$medo0 = $medo->limit('sub',$startpoint,$perpage,'id DESC');
while ($row = $medo->fassoc($medo0)) {
  $c++;
  $cat = explode(" ; ", $row['ca'], -1);
  $i0= 0;
include "inc/template/sub.php";
}
?>
</div>

</div>


<center class="load loa"><i class="load fa fa-spinner fa-spin fa-5x fa-fw"></i></center>


<button onclick="load()" class="loadsty" id="load"><i class="fa fa-refresh" aria-hidden="true"></i> LoadMore</button>






</div>


<?php include "inc/footer.php" ?>
<?php
include "header.php";
include "right.php";
$medo= new medo();

@$medo0 = $medo->selecta('ca');
$rowsnum= $medo->num($medo0);
$perpage = 10;
$pagesnum = ceil($rowsnum/$perpage);
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);  
$page = ($page == 0 ? 1 : $page);  
if ($page > $pagesnum ) {$page = 1;}
$startpoint = ($page * $perpage) - $perpage; 

?>
<div id="rowsnum">عدد النتائج: <?php echo $rowsnum; ?></div>

<a id="add" href="addcat.php">أضف تصنيف جديد</a>

<table>
	<tbody>
	<caption>جدول التصنيفات و الإجراءات الخاصة بها</caption>
		<tr>
			<td>#</td><td>التصنيف\A</td><td>التصنيف\E</td><td>الإجراءات</td>
		</tr>	
<?php
$c = 0 ;
@$medo0 = $medo->limit('ca',$startpoint,$perpage,'cid DESC');
while ($row = $medo->fassoc($medo0)) {
	$c++;
	echo '
<tr>
<td>'.$c.'</td><td>'.$row['cana'].'</td><td>'.$row['cena'].'</td><td><a id="edit" href="editcat.php?action=edit&num='.$row['cid'].'">تعديل</a>   <a id="remove" href="editcat.php?action=delete&num='.$row['cid'].'">حذف</a></td>
</tr>
	';
}



?>
		
	</tbody>
</table>

<?php
$i = $page - 3 ;
//if ($i <= 0 ) {$i = 1 ;}
$i = $i <= 0 ? 1 : $i ;
echo '<div id="pag">';
if($pagesnum > 1 ){
if($page <= 4 ){}else{echo "<a class='pag f' href=' ". $_SERVER['PHP_SELF'] ."?page=1'><<</a>";}
if (($page-1) <= 0) {}else{echo "<a class='pag p' href=' ". $_SERVER['PHP_SELF'] ."?page=".($page-1)."'><</a>";}
echo "...";
for ($i ; $i<=$page + 3; $i++) {  
if ($i <= $pagesnum) {
    if ($i != $page) { 
        $z = "<a class='pag' href='". $_SERVER['PHP_SELF'] ."?page=$i'>$i</a>"; 
    } else { 
        $z = "<u class='pag active'>$i</u>"; 
    } 
    echo "".$z."";  
}
}
echo "...";
if ($page >= $pagesnum) {}else{echo "<a class='pag n' href=' ". $_SERVER['PHP_SELF'] ."?page=".($page + 1)."'>></a>";}
if(($page+3) >= $pagesnum ){}else{echo "<a class='pag l' href=' ". $_SERVER['PHP_SELF'] ."?page=".($pagesnum)."'>>></a>";}
}
echo '</div>';

include "footer.php";
?>
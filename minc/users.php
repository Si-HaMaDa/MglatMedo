<?php
include "header.php";
include "right.php";

if ($_SESSION['user_level'] !== 'iu5s8ef' && $_SESSION['user_level'] !== 'kf8ir21' ) {
            header("location:index.php");
            exit("Try another One");
        } 
$medo= new medo();

@$medo0 = $medo->selecta('users');
$rowsnum= $medo->num($medo0);
$perpage = 10;
$pagesnum = ceil($rowsnum/$perpage);
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);  
$page = ($page == 0 ? 1 : $page);  
if ($page > $pagesnum ) {$page = 1;}
$startpoint = ($page * $perpage) - $perpage;

?>
<div id="rowsnum">عدد الأعضاء: <?php echo $rowsnum; ?></div>

<a id="add" href="register.php">أضف عضو جديد</a>

<table>
	<tbody>
	<caption>جدول الأعضاء و الإجراءات الخاصة بها</caption>
		<tr>
			<td>#</td><td>الـعـضـو</td><td>الإيـمـيـل</td><td>الإجـراءات</td>
		</tr>	
<?php
$c = 0 ;
@$medo0 = $medo->limit('users',$startpoint,$perpage,'user_id DESC');
while ($row = $medo->fassoc($medo0)) {
	$c++;
	echo '
<tr>
<td>'.$c.'</td><td>'.$row['user_name'].'</td><td>'.$row['user_email'].'</td><td><a id="edit" href="editusers.php?action=edit&num='.$row['user_id'].'">تعديل</a>   <a id="remove" href="editusers.php?action=delete&num='.$row['user_id'].'">حذف</a></td>
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
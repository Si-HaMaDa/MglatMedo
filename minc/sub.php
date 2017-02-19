<?php
include "header.php";
include "right.php";
$medo= new medo();

@$medo0 = $medo->selecta('sub');

$rowsnum= $medo->num($medo0);
$perpage = 20;
$pagesnum = ceil($rowsnum/$perpage);
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);  
$page = ($page == 0 ? 1 : $page);  
if ($page > $pagesnum || $page < 0) {$page = 1;}
$startpoint = ($page * $perpage) - $perpage; 

?>

<div id="rowsnum">عدد النتائج: <?php echo $rowsnum; ?></div>

<a id="add" href="addsub.php">أضف موضوع جديد</a>

<form id="search" action="<?php echo htmlspecialchars('subsearch.php');?>" method="post">
  <span><input type="text" name="search"><input id="img" type="image" src="img/search.png" alt="Submit Form"></span>
</form>

<table id="subt">
  <tbody>
  <caption>جدول المواضيع و الإجراءات الخاصة بها</caption>
    <tr>
      <td>#</td><td>أسم الإنمى</td><td>رقم الجزء\الحلقة</td><td>القسم و التصنيفات</td><td>التاريخ</td><td>إعدادات</td>
    </tr> 
<?php
$c = 0 ;
@$medo0 = $medo->limit('sub',$startpoint,$perpage,'id DESC');
while ($row = $medo->fassoc($medo0)) {
  $c++;
  $date = explode(" ; ", $row['date']);
  $kind = $medo->selectsw('kana','ki','kid',$row['ki']);
  $kind = $medo->fassoc($kind);
  $i0= 0;
  echo '
<tr>
<td>'.$c.'</td><td>'.$row['na'].'</td><td>Seasson '.$row['sn'].'/Episode '.$row['en'].'</td><td>'.$kind['kana'].'</td><td>'.$date[0].'</td><td><a id="edit" href="editsub.php?action=edit&num='.$row['id'].'">تعديل</a>   <a id="remove" href="delsub.php?action=delete&num='.$row['id'].'">حذف</a></td>
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
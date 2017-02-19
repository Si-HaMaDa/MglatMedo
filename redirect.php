<?php
include "inc/head.php";

$medo= new medo();

@$medo0 = $medo->selecta('sub');

if (is_numeric(@$_GET['furl'])){
	$num = (int)($_GET['furl']);
	$url = $medo->selectsw('furl, na','sub','id',$num);
	if (mysqli_num_rows($url) > 0 ){
	$url = $medo->fassoc($url);
	$subname = $url['na'];
	$urll = $url['furl'];
	}else {$error = 1;}

}elseif (is_numeric(@$_GET['ourl'])) {
	$num = (int)($_GET['ourl']);
	$url = $medo->selectsw('ourl, na','sub','id',$num);
	if (mysqli_num_rows($url) > 0 ){
	$url = $medo->fassoc($url);
	$subname = $url['na'];
	$urll = $url['ourl'];
	}else {$error = 1;}

} else {
	$error = 1;
}


// $url = $medo->selectsw('kana','sub','id',$num);
// $url = $medo->fassoc($url);

include "inc/header.php";


 
if (@$error) {
?>
<div id="popup1" class="overlay">
	<div class="popup">
		<a class="close" href="#">&times;</a>
		<h3><i class="fa fa-exclamation-circle" aria-hidden="true"></i>
 عفوًا.. خطأ</h3>
		<div class="content">
			عذرًا.. يبدو أنك اتبعت رابط خاطئ أو منتهى الصلاحية..
			<br>
			يمكنك مراسلة مدير الموقع بالأمر.
		</div>
	</div>
</div>
<script>location.href = '#popup1';</script>
<div id="redir">
	<span>
		<div class="content">
			عذرًا.. يبدو أنك اتبعت رابط خاطئ أو منتهى الصلاحية..
			<br>
			يمكنك مراسلة مدير الموقع بالأمر.
		</div>
	</span>
</div>

<?php }else{ ?>

<div id="redir">
<span>

<p>جارى تحويلك إلى التالى..</p>

<b><?php echo $subname; ?></b>

<p>بعد:</p>



<div class="windows8">

	<div class="wBall" id="wBall_1">
		<div class="wInnerBall"></div>
	</div>
	<div class="wBall" id="wBall_2">
		<div class="wInnerBall"></div>
	</div>
	<div class="wBall" id="wBall_3">
		<div class="wInnerBall"></div>
	</div>
	<div class="wBall" id="wBall_4">
		<div class="wInnerBall"></div>
	</div>
	<div class="wBall" id="wBall_5">
		<div class="wInnerBall"></div>
	</div>
	
	<div id="time">--</div>
</div>

<p>إذا حدث خطأ فى التحويل إضغط <a id="redir-a" href="<?php echo $urll;?>">هنا</a> للإنتقال إلى الرابط...</p>

</span>
</div>

<script type="text/javascript">
var fiveMinutes = 5;
var redirectjs = setInterval(function(){
    if (document.readyState === "complete") {
        display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
        clearInterval(redirectjs);
    }
},1000)
</script>

<?php } 

include "inc/footer.php";

?>




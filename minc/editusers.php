<?php
include "header.php";
include "right.php";

if ($_SESSION['user_level'] !== 'iu5s8ef' && $_SESSION['user_level'] !== 'kf8ir21' ) {
            header("location:index.php");
            exit("Try another One");
        }
$medo= new medo();
#####
if (@$_GET['action'] == 'edit') {
	$eid= isset($_GET['num']) ? intval($_GET['num']) : "" ;
	$medo1 = $medo->selectw('users','user_id',$eid);
	$row = $medo->fassoc($medo1);
	if (mysqli_num_rows($medo1) > 0 ) {	
		mysqli_free_result($medo1);
	echo '
<form id="forms" method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" name="registerform">
<input hidden name="userid"   value="'.$eid.'">
    <!-- the user name input field uses a HTML5 pattern check -->
    <span for="login_input_username">User\'s name</span>
    <input value="'.$row['user_name'].'" id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
    <br><br>

    <!-- the email input field uses a HTML5 email type check -->
    <span for="login_input_email">User\'s email</span>
    <input value="'.$row['user_email'].'" id="login_input_email" class="login_input" type="email" name="user_email" required />
    <br><br>

    <span for="login_input_password_new">Password (min. 6 characters)</span>
    <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
    <br><br>

    <span for="login_input_password_repeat">Repeat password</span>
    <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
    <br><br>

    <span for="login_input_level">Select Level</span>
    <select name="user_level">
     <option value="0">User Level</option>
     <option value="kf8ir21">ADuser</option>
     <option value="wl5of7s">Luser</option>
    </select>
    <br><br>

<input type="submit" name="subup" value="Update Category">
</form>
	';
	}else{
		echo '<div id="error"><strong>عفوًا..</strong> و لكن العضو الذى تبحث عنه غير موجود</div>';
	}
}
#####
elseif (@$_GET['action'] == 'delete') {
	$eid= isset($_GET['num']) ? intval($_GET['num']) : "" ;
	$medo1 = $medo->selectw('users','user_id',$eid);
	$row = $medo->fassoc($medo1);
	if (mysqli_num_rows($medo1) > 0 ) {
		mysqli_free_result($medo1);
		echo '
		<div id="error">هل أنت متأكد من حذف هذه البيانات؟</div>
<form method="post"  id="forms" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
<input hidden name="userid"   value="'.$eid.'">
<!-- the user name input field uses a HTML5 pattern check -->
    <span for="login_input_username">User\'s name</span>
    <input disabled value="'.$row['user_name'].'" id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
    <br><br>

    <!-- the email input field uses a HTML5 email type check -->
    <span for="login_input_email">User\'s email</span>
    <input disabled value="'.$row['user_email'].'" id="login_input_email" class="login_input" type="email" name="user_email" required />
    <br><br>
    <input id="yes" type="submit" name="subdel" value="تأكيد"><input id="no" type="submit" name="subno" value="إلغاء">
</form>
	';
		}else{
		echo '<div id="error"><strong>عفوًا..</strong> و لكن التصنيف الذى تبحث عنه غير موجود</div>';
	}
}
#####
elseif (@$_POST['subdel']) {
	@$catid=$medo->safeput($_POST['userid']);
	if($medo->delete('users','user_id',$catid)){
	echo '<div id="good"><strong>حسنًا..</strong> تم حذف البيانات بنجاح</div>';
	echo "<script>setTimeout(\"location.href = 'users.php';\",1500);</script>";
	}else{echo '<div id="error"><strong>عفوًا..</strong> حدث خطأ أثناء تنفيذ الاستعلام.. أعد المحاولة أو راسل مدير الموقع بالأمر</div>';}
}
#####
elseif (@$_POST['subno']) {
	header ("location: users.php");
}
#####
elseif (@$_POST['subup']) {




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

// load the registration class
require_once("classes/Edit.php");

// create the registration object. when this object is created, it will do all registration stuff automatically
// so this single line handles the entire registration process.
$registration = new Edit();

// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error."<br>";
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message."<br>";
        }
    }
}


    if(isset($registration->error0) ){
        echo '<div id="error"><strong>عفوًا..</strong> حدث خطأ أثناء تنفيذ الاستعلام.. أعد المحاولة أو راسل مدير الموقع بالأمر</div>';
    }elseif (isset($registration->success)){
        echo '<div id="good"><p><strong>أحسنت..</strong> تم تحديث البيانات بنجاح، جارى التحويل...</p></div>';
        echo "<script>setTimeout(\"location.href = 'users.php';\",1500);</script>";
    }elseif (isset($registration->errors)){
        $eid= isset($_POST['userid']) ? intval($_POST['userid']) : "" ;
    $medo1 = $medo->selectw('users','user_id',$eid);
    $row = $medo->fassoc($medo1);
    if (mysqli_num_rows($medo1) > 0 ) { 
        mysqli_free_result($medo1);
    echo '
<form id="forms" method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" name="registerform">
<input hidden name="userid"   value="'.$eid.'">
    <!-- the user name input field uses a HTML5 pattern check -->
    <span for="login_input_username">User\'s name</span>
    <input value="'.$row['user_name'].'" id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
    <br><br>

    <!-- the email input field uses a HTML5 email type check -->
    <span for="login_input_email">User\'s email</span>
    <input value="'.$row['user_email'].'" id="login_input_email" class="login_input" type="email" name="user_email" required />
    <br><br>

    <span for="login_input_password_new">Password (min. 6 characters)</span>
    <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
    <br><br>

    <span for="login_input_password_repeat">Repeat password</span>
    <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
    <br><br>

    <span for="login_input_level">Select Level</span>
    <select name="user_level">
     <option value="0">User Level</option>
     <option value="kf8ir21">ADuser</option>
     <option value="wl5of7s">Luser</option>
    </select>
    <br><br>

<input type="submit" name="subup" value="Update Category">
</form>
    ';
    }else{echo '<div id="error"><strong>عفوًا..</strong> و لكن العضو الذى تبحث عنه غير موجود</div>';}

    }else {
        echo '<div id="error"><strong>عفوًا..</strong> حدث خطأ أثناء تنفيذ الاستعلام.. أعد المحاولة أو راسل مدير الموقع بالأمر</div>';
    }


#####
}else{echo '<div  id="error"><p><strong>عفوًا..</strong> لم يتم اختيار أى إجراء</p></div>';}

include "footer.php";
?>
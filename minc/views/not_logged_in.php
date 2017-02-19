<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
 <link rel="stylesheet" type="text/css" href="style/style.css">
 <style type="text/css">body{background: #f4f4f4;height: 100%;}</style>


<!-- login form box -->
<form id="forms" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="loginform">

<div id="login">
                <div id="login-sub-header">
                    <img src="img/cpanel-logo.png" alt="logo">
                </div>

<br>
<h4>الرجاء تسجيل الدخول للمتابعة</h4>
<br>

    <lable for="login_input_username">Username</lable>
    <input id="login_input_username" class="login_input" type="text" name="user_name" required />
    <br>

    <lable for="login_input_password">Password</lable>
    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />
    <br>

    <input type="submit"  name="login" value="Log in" />
</div>
</form>

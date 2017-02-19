<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
            echo '<div id="good"><p><strong>أحسنت..</strong> تم إضافة البيانات بنجاح، جارى التحويل...</p></div>';
        echo "<script>setTimeout(\"location.href = 'users.php';\",1500);</script>";
        }
    }
}
?>

<!-- register form -->
<form id="forms" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="registerform">

    <!-- the user name input field uses a HTML5 pattern check -->
    <span for="login_input_username">User's name</span>
    <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
    <br><br>

    <!-- the email input field uses a HTML5 email type check -->
    <span for="login_input_email">User's email</span>
    <input id="login_input_email" class="login_input" type="email" name="user_email" required />
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

    <input type="submit"  name="register" value="Register" />
</form>

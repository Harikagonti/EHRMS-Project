<?php 
session_start();
// remove all session variables
$_SESSION["election_id"] = "";
$_SESSION["mobile"] = "";
$_SESSION["election_id"] = "";
$_SESSION["mobile"] = "";
$_SESSION["election_role_code"] = "";
$_SESSION["name"] = "";
session_unset();
// destroy the session
session_destroy(); 

include_once('include/db_connection/db_connection.php'); 
$login_error="";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_button'])) {

      $mymobile = test_input($_POST["mymobile"]);
      $mypassword = test_input($_POST["mypassword"]);
        $sql = "SELECT `employee`.`mobile`, `employee`.`election_id`, `employee`.`election_role_code`, `employee`.`name`  from employee WHERE mobile='".$mymobile."' AND password='".$mypassword."'";
        $result = $conn->query($sql);
        // If result matched $myusername and $mypassword, it returns 1 row
        if (mysqli_num_rows($result) === 1) {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION["election_id"] = $row['election_id'];
            $_SESSION["mobile"] = $row['mobile'];
            $_SESSION["election_role_code"] = $row['election_role_code'];
            $_SESSION["name"] = $row['name'];
            header('Location: home.php');
      } else {$login_error="true";}  
    }   
?>
<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?></script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/index_menu.php'); ?>
<h3 class="div-class"><br>You are logged out successfully!</h3>
<h1 class="div-class"><br>Re-Login</h1>
<div class="div-class-login">
<form name="login" id="login" onsubmit="return validate(document)" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Mobile No.<span class="mandatory">*</span>&nbsp;: 
<input autocomplete="off" type="text" name="mymobile" id="mymobile"><br><br>
Password<span class="mandatory">*</span>&nbsp;&nbsp;&nbsp;&nbsp;: 
<input autocomplete="off" type="password" name="mypassword" id="mypassword"><br><br>
<?php
if($login_error=="true")
{
echo "<p align='center' style='color:red'>Error: Please enter valid credentials or please contact Administrator!<br></p><br>";
}
?>
<input id="login_button" name="login_button" type="submit" value="Login">
</form>
</div>
<br/><br><br><br><br>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
<?php
$login_error="";   
?>
</html>
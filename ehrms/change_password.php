<?php include_once('include/db_connection/user_session_include.php'); ?>
<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?>
</script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<br>
<h1 class="div-class">Change Password</h1>
<div class="div-class">
<form name="register" id="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Old Password<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="password" name="oldpassword" id="oldpassword"
value=""><br><br>
New Password<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="password" name="newpassword1" id="newpassword1"
value=""><br><br>
Re-enter New Password<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="password" name="newpassword2" id="newpassword2"
value=""><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_button'])) {
    $election_id=$_SESSION["election_id"];
    $mypassword=$_POST["oldpassword"];
    $newpassword1 = $_POST["newpassword1"];
    $newpassword2 = $_POST["newpassword2"];

    if($newpassword1==$newpassword2){
        $sql = "SELECT `employee`.`mobile`, `employee`.`election_id`  from employee WHERE election_id='".$election_id."' AND password='".$mypassword."'";
            $result = $conn->query($sql);
            // If result matched $myusername and $mypassword, it returns 1 row
            if (mysqli_num_rows($result) === 1) {
                $sql = "UPDATE employee SET password = '".$newpassword1."' WHERE election_id='".$election_id."'";
                    if ($conn->query($sql) === TRUE) {
                    echo "<span style='color:green'>Password has been changed successfully!</span><br>";
                    } else {
                    echo "<span style='color:red'>Error: Please Contact administrator!</span><br>";
                    }
            }else {
                echo "<span style='color:red'>Error: Old password is wrong or contact administrator!</span><br>";
                }
    }else{
        echo "<span style='color:red'>Error: Re-entered new password is not matching! </span><br>";
    }
}
?>
<input id="update_button" name="update_button" type="submit" value="Change Password">
<br><br><br>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>
<?php include_once('include/db_connection/session_include.php'); ?>
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
<h1 class="div-class">Gender Registration Form</h1>
<div class="div-class">
<table class="centered-table">
<form name="register" id="register" onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"><br>
<tr>
<td>
Gender Code<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<input autocomplete="off" type="number" name="mygendercode" id="mygendercode">
</td>
</tr>
<tr>
<td>
Gender Name<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="mygendername" id="mygendername">
</td>
</tr>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_button'])) {

      $mygendercode = test_input($_POST["mygendercode"]);
      $mygendername = test_input($_POST["mygendername"]);

      $sql = "INSERT INTO emp_gender (gender_id, gender_code, gender_name, client_ip_address) VALUES
('','".$mygendercode."','".$mygendername."','".$_SERVER['REMOTE_ADDR']."')";
      if ($conn->query($sql) === TRUE) {
        echo "<span style='color:green'>Data has been saved
successfully!</span><br>";
      } else {
        echo "<span style='color:red'>Error: " . $sql . "<br>" .
$conn->error."</span><br>";
      }
}
?>
<tr>
      <td colspan="3">
<input id="register_button" name="register_button" type="submit" value=" Save ">
</td>
</tr>
</form>
<div>
<br/>
</table>
<br>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>
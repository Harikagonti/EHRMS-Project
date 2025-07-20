<?php include_once('include/db_connection/session_include.php'); ?>
<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
</script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<br>
<h1 class="div-class">Polling Station Type Registration Form</h1>
<div class="div-class">
<table class="centered-table">
<form name="register" id="register"  onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"><br>
<tr>
<td>
Polling Station Type Code<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="mypstypecode" id="mypstypecode">
</td>
</tr>
<tr>
<td>
Polling Station Name<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="mypstypename" id="mypstypename">
</td>
</tr>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_button'])) {

      $mypstypecode = test_input($_POST["mypstypecode"]);
      $mypstypename = test_input($_POST["mypstypename"]);

      $sql = "INSERT INTO ps_type (ps_type_id, ps_type_code, ps_type_name, client_ip_address ) VALUES ('','".$mypstypecode."','".$mypstypename."','".$_SERVER['REMOTE_ADDR']."')";
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
</td>
</form>
<div>
<br/>
</table>
<br>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>
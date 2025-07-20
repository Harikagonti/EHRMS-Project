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
<h1 class="div-class" style="color:blue">Constituency Registration Form</h1>
<div class="div-class">
<table class="centered-table">
<form name="register" id="register" onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"><br>
<tr>
<td>
Polling Station Constituency Code<span class="mandatory">*</span>&nbsp;</td>
<td>:</td>
<td>
<input autocomplete="off" type="number" name="mypsconstituencycode"
id="mypsconstituencycode" required>
</td>
</tr>
<tr>
<td>
Polling Station Constituency Name<span class="mandatory">*</span>&nbsp;</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="mypsconstituencyname"
id="mypsconstituencyname" required>
</td>
</tr>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_button'])) {

      $mypsconstituencycode = test_input($_POST["mypsconstituencycode"]);
      $mypsconstituencyname = test_input($_POST["mypsconstituencyname"]);

      $sql = "SELECT * FROM constituency WHERE
ps_constituency_code=".$mypsconstituencycode;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
            echo "<span style='color:red'>Duplicate Constituency
Code!</span><br>";
      }
      else{
$sql = "INSERT INTO constituency (ps_constituency_id ,
ps_constituency_code, ps_constituency_name, client_ip_address) VALUES
('','".$mypsconstituencycode."','".$mypsconstituencyname."','".$_SERVER['REMOTE_ADDR']."')";
      if ($conn->query($sql) === TRUE) {
        echo "<span style='color:green'>Data has been saved
successfully!</span><br>";
      } else {
        echo "<span style='color:red'>Error: " . $sql . "<br>" .
$conn->error."</span><br>";
      }
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
</br>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>

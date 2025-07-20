<?php include_once('include/db_connection/session_include.php'); ?>
<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
</script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<h1 class="div-class">Division Registration Form</h1>
<div class="div-class">
<table class="centered-table">
<form name="register" id="register" onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"><br>
<tr>
<td>
Division Code<span class="mandatory">*</span></td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="mydivisioncode" id="mydivisioncode" required>
</td>
</tr>
<tr>
<td>
Division Name<span class="mandatory">*</span></td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="mydivisionname" id="mydivisionname" required><br><br>
</td>
</tr>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_button'])) {

      $mydivisioncode = test_input($_POST["mydivisioncode"]);
      $mydivisionname = test_input($_POST["mydivisionname"]);

       // Check division code unique or not
       $sql = "SELECT * FROM division WHERE division_code=".$mydivisioncode;
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
             echo "<span style='color:red'>Duplicate Division Code!</span><br>";
       }
       else{
            $sql = "INSERT INTO division (division_id, division_code, division_name, client_ip_address) VALUES ('','".$mydivisioncode."','".$mydivisionname."','".$_SERVER['REMOTE_ADDR']."')";

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
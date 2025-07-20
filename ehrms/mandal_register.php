<?php include_once('include/db_connection/session_include.php'); ?>
<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?></script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<br>

<h1 class="div-class">Mandal Registration Form</h1>
<div class="div-class">
<table class="centered-table">
<form name="register" id="register" onsubmit="return mandalvalidateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<tr>
<td>Mandal Code<span class="mandatory">*</span>&nbsp;</td>
<td>:</td>
<td><input autocomplete="off" type="number" name="mymandalcode" id="mymandalcode" required></td>
</tr>
<tr>
<td>Mandal Name<span class="mandatory">*</span>&nbsp;</td>
<td>:</td>
<td><input autocomplete="off" type="text" name="mymandalname" id="mymandalname" required></td>
</tr>
<tr>
<td>Division Name<span class="mandatory">*</span>&nbsp;</td>
<td>:</td>
<td>
  <select autocomplete="off" name="mydivisioncode" id="mydivisioncode" required>
    <option value="0">-- Select One --</option>
    <?php
    $sql = "SELECT * FROM division ORDER BY division_name ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<option value=".$row['division_code'].">".$row['division_name']."</option>";
      }
    }
    ?>
  </select>
  
</td>
</tr>
<tr>
<td colspan="3">
  <input id="register_button" name="register_button" type="submit" value="Save">
</td>
</tr>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_button'])) {
  $mymandalcode = test_input($_POST["mymandalcode"]);
  $mymandalname = test_input($_POST["mymandalname"]);
  $mydivisioncode = test_input($_POST["mydivisioncode"]);

  if ($mydivisioncode === '0') {
    echo "<span style='color:red'>Please select an option before submitting.</span><br>";
  }
  // Check mandal code unique or not
  $sql = "SELECT * FROM mandal WHERE mandal_code=".$mymandalcode;
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
        echo "<span style='color:red'>Duplicate Mandal Code!</span><br>";
  }
  else{
    $sql = "INSERT INTO mandal (mandal_code, mandal_name, division_code, client_ip_address) VALUES ('".$mymandalcode."','".$mymandalname."','".$mydivisioncode."','".$_SERVER['REMOTE_ADDR']."')";
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
   
</table>
</div>
<br/>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>
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
<h1 class="div-class">Office Registration Form</h1>
<div class="div-class">
<table class="centered-table">
<form name="register" id="register" onsubmit="return emp_officevalidateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<tr>
<td>
Office Code<span class="mandatory">*</span>&nbsp;
<td>:</td>
</td>
<td>
<input autocomplete="off" type="number" name="myofficecode" id="myofficecode" required>
</td>
</tr>
<tr>
<td>
Office Name<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="myofficename" id="myofficename" required>
</td>
</tr>
<tr>
<td>
Department Name<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<select autocomplete="off" type="number" name="mydeptcode" id="mydeptcode" required>
<option value="0">-- Select One --</option>
<?php
$sql = "SELECT * FROM emp_dept ORDER BY dept_name ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['dept_code'].">".$row['dept_name']."</option>";
  }
}
?>
</select>
</td>
</tr>
<tr>
<td>
Office Type Name<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<select autocomplete="off" type="number" name="myofficetypecode" id="myofficetypecode" required>
<option value="0">-- Select One --</option>
<?php
$sql = "SELECT * FROM emp_office_type ORDER BY office_type_name ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['office_type_code'].">".$row['office_type_name']."</option>";
  }
}
?>
</select>
</td>
</tr>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_button'])) {

      $myofficecode = test_input($_POST["myofficecode"]);
      $myofficename = test_input($_POST["myofficename"]);
      $mydeptcode = test_input($_POST["mydeptcode"]);
      $myofficetypecode = test_input($_POST["myofficetypecode"]);
      if ($mydeptcode === '0' || $myofficetypecode === '0') {
        echo "<span style='color:red'>Please select an option before submitting.</span><br>";
      }
      // Check mandal code unique or not
      $sql = "SELECT * FROM emp_office WHERE office_code=".$myofficecode;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
            echo "<span style='color:red'>Duplicate Office Code!</span><br>";
      }
      else{
        $sql = "INSERT INTO emp_office (office_id, office_code,
        office_name, dept_code, office_type_code, client_ip_address) VALUES
        ('','".$myofficecode."','".$myofficename."','".$mydeptcode."','".$myofficetypecode."','".$_SERVER['REMOTE_ADDR']."')";
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
</tr>
</td>
</form>
<div>
<br/>
</table>
<br>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>
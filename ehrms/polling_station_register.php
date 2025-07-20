<?php include_once('include/db_connection/session_include.php'); ?>
<html>
<head>
<style>
  <?php include_once('include/css/style_sheet.css'); ?>
</style>
<script>
  <?php include_once('include/js/java_script.js');?>
</script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<h1 class="div-class">Polling Station Registration Form </h1>
<div class="div-class">
<table class="centered-table">
<form name="register" id="register" onsubmit="return polling_stationvalidateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<br>
<tr>
<td>
Polling Station Code<span class="mandatory">*</span></td>
<td>:</td>
<td>
<input autocomplete="off" type="number" name="mypscode" id="mypscode" required>
</td>
</tr>
<tr>
<td>
Polling Station Mandal Name<span class="mandatory">*</span></td>
<td>:</td>
<td>
<select autocomplete="off" type="number" name="mypsmandalcode" id="mypsmandalcode" required>
<option value="0">-- Select One --</option>
<?php
$sql = "SELECT * FROM mandal ORDER BY mandal_name ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<option value=".$row['mandal_code'].">".$row['mandal_name']."</option>";
  }
}
?>
</select>
</td>
</tr>
<tr>
<td>
Polling Station Division Name<span class="mandatory">*</span></td>
<td>:</td>
<td>
<select autocomplete="off" type="number" name="mypsdivisioncode" id="mypsdivisioncode" required>
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
<td>
Polling Station Constituency Name<span class="mandatory">*</span></td>
<td>:</td>
<td>
<select autocomplete="off" type="number" name="mypsconstituencycode" id="mypsconstituencycode" required>
<option value="0">-- Select One --</option>
<?php
$sql = "SELECT * FROM constituency ORDER BY ps_constituency_name ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<option value=".$row['ps_constituency_code'].">".$row['ps_constituency_name']."</option>";
  }
}
?>
</select>
</td>
</tr>
<tr>
<td>
Polling Station No<span class="mandatory">*</span></td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="mypsno" id="mypsno" required>
</td>
</tr>
<tr>
<td>
Polling Station Name<span class="mandatory">*</span></td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="mypsname" id="mypsname" required>
</td>
</tr>
<tr>
<td>
No Of Voters<span class="mandatory">*</span></td>
<td>:</td>
<td>
<input autocomplete="off" type="number" name="mynoofvoters" id="mynoofvoters" required>
</td>
</tr>
<tr>
<td>
Allot Flag ('Yes' for Ready for polling, 'No' for not ready for polling.)<span class="mandatory">*</span></td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="myallotfalag" id="myallotflag" required>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_button']) && empty($_POST['myallotfalag'])) {
  echo "<span style='color:red'>Please fill in the Allot Flag field.</span><br>";
}
?>
</td>
</tr>
<tr>
<td>
Polling Station Type<span class="mandatory">*</span>
</td>
<td>:</td>
<td>
<select autocomplete="off" type="number" name="mypstypecode" id="mypstypecode" required>
<option value="0">-- Select One --</option>
<?php
$sql = "SELECT * FROM ps_type ORDER BY ps_type_name ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<option value=".$row['ps_type_code'].">".$row['ps_type_name']."</option>";
  }
}
?>
</select>
</td>
</tr>
<tr>
<td>
Distribution Center<span class="mandatory">*</span>
</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="mydistributioncenter" id="mydistributioncenter" required>
</td>
</tr>
<tr>
<td>
Distribution Reporting<span class="mandatory">*</span>
</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="mydistributionreporting" id="mydistributionreporting" required>
</td>
</tr>
<tr>
<td>
Reception Center<span class="mandatory">*</span>
</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="myreceptioncenter" id="myreceptioncenter" required>
</td>
</tr>
<tr>
<td>
Reception Reporting<span class="mandatory">*</span>
</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="myreceptionreporting" id="myreceptionreporting" required>
</td>
</tr>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_button'])) {
  $mypscode = test_input($_POST["mypscode"]);
  $mypsmandalcode = test_input($_POST["mypsmandalcode"]);
  $mypsdivisioncode = test_input($_POST["mypsdivisioncode"]);
  $mypsconstituencycode = test_input($_POST["mypsconstituencycode"]);
  $mypsno = test_input($_POST["mypsno"]);
  $mypsname = test_input($_POST["mypsname"]);
  $mynoofvoters = test_input($_POST["mynoofvoters"]);
  $myallotfalag = test_input($_POST["myallotfalag"]);
  $mypstypecode = test_input($_POST["mypstypecode"]);
  $mydistributioncenter = test_input($_POST["mydistributioncenter"]);
  $mydistributionreporting = test_input($_POST["mydistributionreporting"]);
  $myreceptioncenter = test_input($_POST["myreceptioncenter"]);
  $myreceptionreporting = test_input($_POST["myreceptionreporting"]);
  // rest of the code for processing the form data
  if ($mypsmandalcode === '0' || $mypsdivisioncode === '0'  || $mypsconstituencycode === '0' || $mypstypecode === '0') {
    echo "<span style='color:red'>Please select an option before submitting.</span><br>";
  } else {
    // Check mandal code unique or not
  $sql = "SELECT * FROM polling_station WHERE ps_code=".$mypscode;
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
        echo "<span style='color:red'>Duplicate Polling Station Code!</span><br>";
  }
  else{
    $sql = "INSERT INTO polling_station (ps_code, ps_mandal_code, ps_division_code, ps_constituency_code, ps_no, ps_name, no_of_voters, allot_flag, ps_type_code, distribution_center, distribution_reporting, reception_center, reception_reporting, client_ip_address) VALUES ('".$mypscode."','".$mypsmandalcode."','".$mypsdivisioncode."','".$mypsconstituencycode."','".$mypsno."','".$mypsname."','".$mynoofvoters."',
    '".$myallotfalag."','".$mypstypecode."','".$mydistributioncenter."','".$mydistributionreporting."','".$myreceptioncenter."','".$myreceptionreporting."','".$_SERVER['REMOTE_ADDR']."')";        if ($conn->query($sql) === TRUE) {
              echo "<span style='color:green'>Data has been saved
successfully!</span><br>";
        } else {
              echo "<span style='color:red'>Error: " . $sql . "<br>" .
              $conn->error."</span><br>";
        }
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
<br>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>
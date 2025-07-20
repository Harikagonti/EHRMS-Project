<?php include_once('include/db_connection/session_include.php'); ?>
<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?></script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<h1 class="div-class"> Polling Station Details</h1>
<nav><div class="myDiv">
<form><input type="button" value="Back" onclick="history.back()"></form>
</div></nav>
<table class="centered-table">
<?php
$ps_id = test_input($_POST["ps_id"]);
$sql = "SELECT `polling_station`.`ps_id`, `polling_station`.`ps_code`, `polling_station`.`ps_mandal_code`, `polling_station`.`ps_division_code`, `polling_station`.`ps_constituency_code`, `polling_station`.`ps_no`, `polling_station`.`ps_name`, `polling_station`.`no_of_voters`, `polling_station`.`allot_flag`, `polling_station`.`ps_type_code`, `polling_station`.`distribution_center`, `polling_station`.`distribution_reporting`, `polling_station`.`reception_center`, `polling_station`.`reception_reporting`, 
`mandal`.`mandal_name`, `division`.`division_name`, `constituency`.`ps_constituency_name`, `ps_type`.`ps_type_name` FROM `polling_station`
JOIN `mandal` ON `polling_station`.`ps_mandal_code`=`mandal`.`mandal_code`  
JOIN `division` ON `polling_station`.`ps_division_code`=`division`.`division_code` 
JOIN `constituency` ON `polling_station`.`ps_constituency_code`=`constituency`.`ps_constituency_code` 
JOIN `ps_type` ON `polling_station`.`ps_type_code`=`ps_type`.`ps_type_code`
  WHERE `polling_station`.`ps_id`='".$ps_id."'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $i=1;
  while($row = $result->fetch_assoc()) {
    echo "<tr><th>Polling Station ID</th><td>".$row['ps_id']."</td></tr><tr><th>Polling Station Code</th><td>".$row['ps_code']."</td></tr><tr><th>Polling Station No</th><td>".$row['ps_no']."</td></tr><tr><th>Polling Station Name</th><td>".$row['ps_name']."</td></tr><tr><th>No. of Voters</th><td>".$row['no_of_voters']."</td></tr><tr><th>Allot Flag</th><td>".$row['allot_flag']."</td></tr><tr><th>Distribution Center</th><td>".$row['distribution_center']."</td></tr><tr><th>Distribution Reporting</th><td>".$row['distribution_reporting']."</td></tr><tr><th>Reception Center</th><td>".$row['reception_center']."</td></tr><tr><th>Reception Reporting</th><td>".$row['reception_reporting']."</td>
    </tr><tr><th>Polling Station Mandal Name</th><td>".$row['mandal_name']."</td></tr><tr><th>Polling Station Division Name</th><td>".$row['division_name']."</td></tr><tr><th>Polling Station Constituency Name</th><td>".$row['ps_constituency_name']."</td></tr><tr><th>Polling Station Type(General/ Women PS)</th><td>".$row['ps_type_name']."</td></tr>";
  $i++;
  }
} else { echo "<tr><td align='center' colspan='6'>(0 Results)</td></tr>"; }
$conn->close();
?>
</table>
<br>
<nav><div class="myDiv">
<form><input type="button" value="Back" onclick="history.back()"></form>
</div></nav>
<br>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>
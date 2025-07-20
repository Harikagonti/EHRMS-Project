<?php include_once('include/db_connection/session_include.php'); 
function view_more($ps_id){
  $btn="";
  $btn="<form name='view_more' id='view_more' action='polling_station_view_more.php' method='POST'>
  <input type='hidden' value='".$ps_id."' name='ps_id' id='ps_id'>
  <input type='submit' name='edit_button' id='edit_button' value='View'></form>";
  return $btn;
}
?>
<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?></script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<br>
<h1 class="div-class">Polling Stations List</h1>
<table class="centered-table">
<tr><th>Polling Station ID</th><th>Polling Station No.</th><th>Polling Station Mandal</th><th>Polling Station Division</th><th>Polling Station Constituency</th><th>View More Details</th></tr>
<?php
$sql = "SELECT `polling_station`.`ps_id`, `polling_station`.`ps_code`, `polling_station`.`ps_mandal_code`, `polling_station`.`ps_division_code`, `polling_station`.`ps_constituency_code`, `polling_station`.`ps_no`, `polling_station`.`ps_name`, `polling_station`.`no_of_voters`, `polling_station`.`allot_flag`, `polling_station`.`ps_type_code`, `polling_station`.`distribution_center`, `polling_station`.`distribution_reporting`, `polling_station`.`reception_center`, `polling_station`.`reception_reporting`, 
`mandal`.`mandal_name`, `division`.`division_name`, `constituency`.`ps_constituency_name`, `ps_type`.`ps_type_name` FROM `polling_station`
JOIN `mandal` ON `polling_station`.`ps_mandal_code`=`mandal`.`mandal_code`  
JOIN `division` ON `polling_station`.`ps_division_code`=`division`.`division_code` 
JOIN `constituency` ON `polling_station`.`ps_constituency_code`=`constituency`.`ps_constituency_code` 
JOIN `ps_type` ON `polling_station`.`ps_type_code`=`ps_type`.`ps_type_code` ORDER BY `polling_station`.`ps_id` ASC ";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $i=1;
  while($row = $result->fetch_assoc()) {
echo "<tr><td>".$row['ps_id']."</td><td>".$row['ps_no']."</td><td>".$row['mandal_name']."</td><td>".$row['division_name']."</td><td>".$row['ps_name']."</td><td>".view_more($row['ps_id'])."</td></tr>";
  $i++;
  }
} else { echo "<tr><td align='center' colspan='3'>(0 Results)</td></tr>"; }
$conn->close();
?>
</table>
<br>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>
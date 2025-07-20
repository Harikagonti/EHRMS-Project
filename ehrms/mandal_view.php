<?php include_once('include/db_connection/session_include.php'); ?>
<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?></script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<h1 class="div-class"> View Mandal Details</h1>
<table class="centered-table">
<tr><th>Mandal Id<th>Mandal Code</th><th>Mandal name</th><th>Division Code</th><th>Division Name</tr>
<?php
$sql = "SELECT `mandal`.`mandal_id`,`mandal`.`mandal_code`,`mandal`.`mandal_name`,`mandal`.`division_code`, `division`.`division_name` FROM `mandal`,`division` WHERE `mandal`.`division_code`=`division`.`division_code`;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $i=1;
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row['mandal_id']."</td><td>".$row['mandal_code']."</td><td>".$row['mandal_name']."</td><td>".$row['division_code']."</td><td>".$row['division_name']."</td></tr>";
  $i++;
  }
} else { echo "<tr><td align='center' colspan='4'>(0 Results)</td></tr>"; }
$conn->close();
?>
</table>
<br>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>
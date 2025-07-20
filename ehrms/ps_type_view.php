<?php include_once('include/db_connection/session_include.php'); ?>
<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?></script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<h1 class="div-class">Polling Station Types</h1>
<table class="centered-table">
<tr><th>PS Type ID</th><th>PS Type Code</th><th>PS Type Name</th></tr>
<?php
$sql = "SELECT * FROM ps_type ORDER BY ps_type_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $i=1;
  while($row = $result->fetch_assoc()) {
echo "<tr><td>".$row['ps_type_id']."</td><td>".$row['ps_type_code']."</td><td>".$row['ps_type_name']."</td></tr>";
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

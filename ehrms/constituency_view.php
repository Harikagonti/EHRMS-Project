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
<h1 class="div-class" style="color:blue">Constituency Registered Data</h1><br>
<table class="centered-table">
<tr><th>Polling Station Constituency Id</th><th>Polling Station
Constituency Code</th><th>Polling Station Constituency Name</th></tr>
<?php
$sql = "SELECT * FROM constituency ORDER BY ps_constituency_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $i=1;
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row['ps_constituency_id']."</td><td>".$row['ps_constituency_code']."</td><td>".$row['ps_constituency_name']."</td></tr>";
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

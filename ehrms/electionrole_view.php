<?php include_once('include/db_connection/session_include.php'); ?>
<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?></script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<h1 class="div-class"> Election Roles View</h1>
<table class="centered-table">
<tr><th>Election Role ID<th>Election Role Code</th><th>Election Role</th><th>Detailed Election Role</th></tr>
<?php
$sql = "SELECT * FROM election_role ORDER BY election_role_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $i=1;
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row['election_role_id']."</td><td>".$row['election_role_code']."</td><td>".$row['election_role']."</td><td>".$row['detailed_election_role']."</td></tr>";
  $i++;
  }
} else { echo "<tr><td align='center' colspan='4'>(0 Results)</td></tr>"; }
$conn->close();
?>
</table>
<br/>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>
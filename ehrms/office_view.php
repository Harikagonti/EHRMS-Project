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
<h1 class="div-class">Employee Office Details</h1><br>
<table class="centered-table">
<tr><th>Office Id<th>Office Code</th><th>Office Name</th><th>Department
Code</th><th>Oficce Type Code</th><th>Department Name</th><th>Office Type Name</th></tr>
<?php
$sql = "SELECT `emp_office`.`office_id`,`emp_office`.`office_code`,`emp_office`.`office_name`,`emp_office`.`dept_code`,
`emp_office`.`office_type_code`, `emp_dept`.`dept_name`,
`emp_office_type`.`office_type_name` 
FROM
`emp_office`,`emp_dept`,`emp_office_type` WHERE
`emp_office`.`dept_code`=`emp_dept`.`dept_code` AND
`emp_office`.`office_type_code`=`emp_office_type`.`office_type_code` ORDER BY emp_office.office_id ASC";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $i=1;
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row['office_id']."</td><td>".$row['office_code']."</td><td>".$row['office_name']."</td><td>".$row['dept_code']."</td><td>".$row['office_type_code']."</td><td>".$row['dept_name']."</td><td>".$row['office_type_name']."</td></tr>";
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

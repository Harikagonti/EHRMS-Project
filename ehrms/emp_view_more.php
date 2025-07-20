<?php include_once('include/db_connection/user_session_include.php'); ?>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?></script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<h1 class="div-class"> Employee Registered Data</h1>
<nav><div class="myDiv1">
<form><input type="button" value="Back" onclick="history.back()"></form>
</div></nav>
<table class="centered-table">
<?php
$election_id = test_input($_POST["election_id"]);

// single user query


$sql = "SELECT `employee`.`election_id`,
`employee`.`election_role_code`,
`employee`.`emp_id`,
`employee`.`cfms_id`,
`employee`.`name`,
`employee`.`designation`,
`employee`.`scale_of_pay`,
`employee`.`basic_pay`,
`employee`.`gazatted_status`,
`employee`.`dob`,
`employee`.`age`,
`employee`.`working_mandal_code`,
`employee`.`native_mandal_code`,
`employee`.`residence_mandal_code`,
`employee`.`mobile`,
`employee`.`emp_type_code`,
`employee`.`gender_code`,
`employee`.`office_code`,
`election_role`.`election_role`,
`emp_gender`.`gender_name`,
`working_mandal`.`mandal_name` AS `working_mandal_name`,
`native_mandal`.`mandal_name` AS `native_mandal_name`,
`residence_mandal`.`mandal_name` AS `residence_mandal_name`,
`emp_office`.`office_name`,
`emp_type`.`emp_type_name`
 FROM 
 `employee`
  JOIN `election_role` ON `employee`.`election_role_code` = `election_role`.`election_role_code`
  JOIN `emp_gender` ON `employee`.`gender_code` = `emp_gender`.`gender_code`
  JOIN `mandal` AS `working_mandal` ON `employee`.`working_mandal_code` = `working_mandal`.`mandal_code`
  JOIN `mandal` AS `native_mandal` ON `employee`.`native_mandal_code` = `native_mandal`.`mandal_code`
  JOIN `mandal` AS `residence_mandal` ON `employee`.`residence_mandal_code` = `residence_mandal`.`mandal_code`
  JOIN `emp_office` ON `employee`.`office_code` = `emp_office`.`office_code`
  JOIN `emp_type` ON `employee`.`emp_type_code` = `emp_type`.`emp_type_code`
  WHERE `employee`.`election_id`='".$election_id."'";

// admin role query
$sql = "SELECT `employee`.`election_id`,
`employee`.`election_role_code`,
`employee`.`emp_id`,
`employee`.`cfms_id`,
`employee`.`name`,
`employee`.`designation`,
`employee`.`scale_of_pay`,
`employee`.`basic_pay`,
`employee`.`gazatted_status`,
`employee`.`dob`,
`employee`.`age`,
`employee`.`working_mandal_code`,
`employee`.`native_mandal_code`,
`employee`.`residence_mandal_code`,
`employee`.`mobile`,
`employee`.`emp_type_code`,
`employee`.`gender_code`,
`employee`.`office_code`,
`employee`.`myphoto`,
`election_role`.`election_role`,
`emp_gender`.`gender_name`,
`working_mandal`.`mandal_name` AS `working_mandal_name`,
`native_mandal`.`mandal_name` AS `native_mandal_name`,
`residence_mandal`.`mandal_name` AS `residence_mandal_name`,
`emp_office`.`office_name`,
`emp_type`.`emp_type_name`
 FROM 
 `employee`
  JOIN `election_role` ON `employee`.`election_role_code` = `election_role`.`election_role_code`
  JOIN `emp_gender` ON `employee`.`gender_code` = `emp_gender`.`gender_code`
  JOIN `mandal` AS `working_mandal` ON `employee`.`working_mandal_code` = `working_mandal`.`mandal_code`
  JOIN `mandal` AS `native_mandal` ON `employee`.`native_mandal_code` = `native_mandal`.`mandal_code`
  JOIN `mandal` AS `residence_mandal` ON `employee`.`residence_mandal_code` = `residence_mandal`.`mandal_code`
  JOIN `emp_office` ON `employee`.`office_code` = `emp_office`.`office_code`
  JOIN `emp_type` ON `employee`.`emp_type_code` = `emp_type`.`emp_type_code`
  WHERE `employee`.`election_id`='".$election_id."'";


$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $i=1;
  while($row = $result->fetch_assoc()) {
    echo "<tr><th>Name & Photo</th><td><img height='150' width='110' src='data:image/jpg;charset=utf8;base64,".base64_encode($row['myphoto'])."'/><br><br>".$row['name']."</td></tr><tr><th>Election Id</th><td>".$row['election_id']."</td></tr><th>Election Role Code</th><td>".$row['election_role_code']."</td></tr><tr><th>Emp Id</th><td>".$row['emp_id']."</td></tr><tr><th>CFMS Id</th><td>".$row['cfms_id']."</td></tr><tr><th>Designation</th><td>".$row['designation']."</td></tr><tr><th>Scale Of Pay</th><td>".$row['scale_of_pay']."</td></tr><tr><th>Basic Pay</th><td>".$row['basic_pay']."</td></tr><tr><th>Gazatted Status</th><td>".$row['gazatted_status']."</td></tr><tr><th>DOB</th><td>".$row['dob']."</td></tr><tr><th>Age</th><td>".$row['age']."</td>
    </tr><tr><th>Working Mandal Code</th><td>".$row['working_mandal_code']."</td></tr><tr><th>Native Mandal Code</th><td>".$row['native_mandal_code']."</td></tr><tr><th>Residence Mandal
    Code</th><td>".$row['residence_mandal_code']."</td></tr><tr><th>Mobile</th><td>".$row['mobile']."</td></tr><tr><th>Emp Type Code</th><td>".$row['emp_type_code']."</td></tr><tr><th>Gender Code</th><td>".$row['gender_code']."</td></tr><tr><th>Office Code</th><td>".$row['office_code']."</td></tr><tr><th>Election Role</th><td>".$row['election_role']."</td></tr><tr><th>Gender Name</th><td>".$row['gender_name']."</td></tr><tr><th>Working Mandal Name</th><td>".$row['working_mandal_name']."</td></tr><tr><th>Native Mandal Name</th><td>".$row['native_mandal_name']."</td></tr>
    <tr><th>Residence Mandal Name</th><td>".$row['residence_mandal_name']."</td></tr><tr><th>Office Name</th><td>".$row['office_name']."</td></tr><tr>><th>Employee Type Name</th><td>".$row['emp_type_name']."</td></tr>";
    //echo "<tr><td>".$row['election_id']."</td><td>".$row['emp_id']."</td><td>".$row['cfms_id']."</td><td>".$row['name']."</td><td>".$row['designation']."</td><td>".view_more($row['election_id'])."</td></tr>";
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
<?php include_once('include/php/footer_menu.php');?>
</body>
</html>
<?php include_once('include/db_connection/user_session_include.php'); 
    function view_more($election_id){
      $btn="";
      $btn="<form name='view_more' id='view_more' action='emp_view_more.php' method='POST'>
      <input type='hidden' value='".$election_id."' name='election_id' id='election_id'>
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
<h1 class="div-class">View Employee Details</h1><br>
<table class="centered-table">
<tr><th>Photo</th><th>Election Id</th><th>Emp Id</th><th>Mobile No.</th><th>Name</th><th>Designation</th><th>Election Role</th><th>View More Details</th></tr>
<?php
if($_SESSION["election_role_code"]=="8" OR $_SESSION["election_role_code"]=="9" OR $_SESSION["election_role_code"]=="10" OR $_SESSION["election_role_code"]=="11" OR $_SESSION["election_role_code"]=="12"){
$sql = "SELECT `employee`.`election_id`, `employee`.`election_role_code`,
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
  JOIN `emp_type` ON `employee`.`emp_type_code` = `emp_type`.`emp_type_code` ORDER BY election_id";
} else {
$sql = "SELECT `employee`.`election_id`, `employee`.`election_role_code`,
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
`employee`.`myphoto`,
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
WHERE election_id='".$_SESSION["election_id"]."' ORDER BY election_id";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $i=1;
  while($row = $result->fetch_assoc()) {
    //echo "<tr><td>".$row['election_id']."</td><td>".$row['emp_id']."</td><td>".$row['cfms_id']."</td><td>".$row['name']."</td><td>".$row['designation']."</td><td>".$row['scale_of_pay']."</td><td>".$row['basic_pay']."</td><td>".$row['gazatted_status']."</td><td>".$row['dob']."</td><td>".$row['age']."</td>
    //<td>".$row['working_mandal_code']."</td><td>".$row['native_mandal_code']."</td><td>".$row['residence_mandal_code']."</td><td>".$row['mobile']."</td><td>".$row['emp_type_code']."</td><td>".$row['gender_code']."</td><td>".$row['office_code']."</td><td>".$row['election_role']."</td><td>".$row['gender_name']."</td><td>".$row['working_mandal_name']."</td><td>".$row['native_mandal_name']."</td><td>".$row['residence_mandal_name']."</td><td>".$row['office_name']."</td><td>".$row['emp_type_name']."</td></tr>";
    echo "<tr><td><img height='110' width='80' src='data:image/jpg;charset=utf8;base64,".base64_encode($row['myphoto'])."'/></td><td>".$row['election_id']."</td><td>".$row['emp_id']."</td><td>".$row['mobile']."</td><td>".$row['name']."</td><td>".$row['designation']."</td><td>".$row['election_role']."</td><td>".view_more($row['election_id'])."</td></tr>";
  $i++;
  }
} else { echo "<tr><td align='center' colspan='6'>(0 Results)</td></tr>"; }
$conn->close();
?>
</table>
<br>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>
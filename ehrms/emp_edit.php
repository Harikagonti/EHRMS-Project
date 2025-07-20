<?php
$id="";
$myelectionrolecode="";
$myempid="";
$mycfmsid="";
$myname="";
$mydesignation="";
$myscaleofpay="";
$mybasicpay="";
$mygazattedstatus="";
$mydob="";
$myage="";
$myworkingmandalcode="";
$mynativemandalcode="";
$myresidencemandalcode="";
$mymobile="";
$myemptypecode="";
$mygendercode="";
$myofficecode="";
    function edit_button($row_id){
        $btn="";
        $btn="<form onsubmit='return take_confirmation1()' name='edit' id='edit'
action='".htmlspecialchars($_SERVER["PHP_SELF"])."'
method='POST'><input type='hidden' value='".$row_id."' name='row_id'
id='row_id'><input value='Edit' type='submit' name='edit_button'
id='edit_button'></form>";
        return $btn;
    }
?>
<?php include_once('include/db_connection/user_session_include.php'); ?>
<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?>
</script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<h1 class="div-class">Edit Employee Details</h1>
<div class="div-class">
<form name="register" id="register" onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_button'])) {
    $sql = "SELECT * FROM employee WHERE election_id='".$_POST['row_id']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $id=$row['election_id'];
        $myelectionrolecode=$row['election_role_code'];
        $myempid=$row['emp_id'];
        $mycfmsid=$row['cfms_id'];
        $myname=$row['name'];
        $mydesignation=$row['designation'];
        $myscaleofpay=$row['scale_of_pay'];
        $mybasicpay=$row['basic_pay'];
        $mygazattedstatus=$row['gazatted_status'];
        $mydob=$row['dob'];
        $myage=$row['age'];
        $myworkingmandalcode=$row['working_mandal_code'];
        $mynativemandalcode=$row['native_mandal_code'];
        $myresidencemandalcode=$row['residence_mandal_code'];
        $mymobile=$row['mobile'];
        $myemptypecode=$row['emp_type_code'];
        $mygendercode=$row['gender_code'];
        $myofficecode=$row['office_code'];
    }
    }

?>

<input type="hidden" value="<?php echo $id; ?>" name="id" id="id">
Election Role Name<span class="mandatory">*</span>&nbsp;: <select
autocomplete="off" type="number" name="myelectionrolecode"
id="myelectionrolecode"
value="<?php echo $myelectionrolecode; ?>">
<?php
//Only admin can change election role
if($_SESSION["election_role_code"]=='12'){
  $sql = "SELECT * FROM election_role ORDER BY election_role_code ASC"; 
}else{
  $sql = "SELECT * FROM election_role WHERE election_role_code='".$myelectionrolecode."' ORDER BY election_role_id ASC";
}
//$sql = "SELECT * FROM election_role ORDER BY election_role_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['election_role_code']==$myelectionrolecode)
        {echo "<option value=".$row['election_role_code']." selected>".$row['election_role']."</option>";}
    else
        {echo "<option value=".$row['election_role_code'].">".$row['election_role']."</option>";}
    
  }
}
?>
</select><br><br>
Emp Id<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="myempid" id="myempid"
value="<?php echo $myempid; ?>"><br><br>
CFMS Id<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="mycfmsid" id="mycfmsid"
value="<?php echo $mycfmsid; ?>"><br><br>
Name<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="myname" id="myname"
value="<?php echo $myname; ?>"><br><br>
Designation<span class="mandatory">*</span>:<input
autocomplete="off" type="text" name="mydesignation"
id="mydesignation" value="<?php echo $mydesignation; ?>"><br><br>
Scale Of Pay<span class="mandatory">*</span>:<input
autocomplete="off" type="text" name="myscaleofpay"
id="myscaleofpay" value="<?php echo $myscaleofpay; ?>"><br><br>
Basic Pay<span class="mandatory">*</span>:<input
autocomplete="off" type="text" name="mybasicpay"
id="mybasicpay" value="<?php echo $mybasicpay; ?>"><br><br>
Gazatted Status<span class="mandatory">*</span>:<select
autocomplete="off" type="text" name="mygazattedstatus"
id="mygazattedstatus" value="<?php echo $mygazattedstatus; ?>">
<option value="yes">Yes</option>
  <option value="no">No</option>
</select><br><br>
DOB<span class="mandatory">*</span>:<input
autocomplete="off" type="date" name="mydob"
id="mydob" value="<?php echo $mydob; ?>"><br><br>
Age<span class="mandatory">*</span>:<input
autocomplete="off" type="number" name="myage"
id="myage" value="<?php echo $myage; ?>"><br><br>
Working Mandal Name<span class="mandatory">*</span>:<select
autocomplete="off" type="number" name="myworkingmandalcode"
id="myworkingmandalcode" value="<?php echo $myworkingmandalcode; ?>"><br><br>
<?php
$sql = "SELECT * FROM mandal ORDER BY mandal_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['mandal_code']==$myworkingmandalcode)
        {echo "<option value=".$row['mandal_code']." selected>".$row['mandal_name']."</option>";}
    else
        {echo "<option value=".$row['mandal_code'].">".$row['mandal_name']."</option>";}
    
  }
}
?>
</select><br><br>
Native Mandal Name<span class="mandatory">*</span>:<select
autocomplete="off" type="number" name="mynativemandalcode"
id="mynativemandalcode" value="<?php echo $mynativemandalcode; ?>"><br><br>
<?php
$sql = "SELECT * FROM mandal ORDER BY mandal_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['mandal_code']==$mynativemandalcode)
        {echo "<option value=".$row['mandal_code']." selected>".$row['mandal_name']."</option>";}
    else
        {echo "<option value=".$row['mandal_code'].">".$row['mandal_name']."</option>";}
    
  }
}
?>
</select><br><br>
Residence Mandal Name<span class="mandatory">*</span>:<select
autocomplete="off" type="number" name="myresidencemandalcode"
id="myresidencemandalcode" value="<?php echo $myresidencemandalcode;
?>"><br><br>
<?php
$sql = "SELECT * FROM mandal ORDER BY mandal_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['mandal_code']==$myresidencemandalcode)
        {echo "<option value=".$row['mandal_code']." selected>".$row['mandal_name']."</option>";}
    else
        {echo "<option value=".$row['mandal_code'].">".$row['mandal_name']."</option>";}
    
  }
}
?>
</select><br><br>
Mobile<span class="mandatory">*</span>:<input
autocomplete="off" type="number" name="mymobile"
id="mymobile" value="<?php echo $mymobile; ?>"><br><br>
Emp Type Name<span class="mandatory">*</span>:<select
autocomplete="off" type="number" name="myemptypecode"
id="myemptypecode" value="<?php echo $myemptypecode; ?>"><br><br>
<?php
$sql = "SELECT * FROM emp_type ORDER BY emp_type_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['emp_type_code']==$myemptypecode)
        {echo "<option value=".$row['emp_type_code']." selected>".$row['emp_type_name']."</option>";}
    else
        {echo "<option value=".$row['emp_type_code'].">".$row['emp_type_name']."</option>";}
    
  }
}
?>
</select><br><br>
Gender Name<span class="mandatory">*</span>:<select
autocomplete="off" type="number" name="mygendercode"
id="mygendercode" value="<?php echo $mygendercode; ?>"><br><br>
<?php
$sql = "SELECT * FROM emp_gender ORDER BY gender_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['gender_code']==$mygendercode)
        {echo "<option value=".$row['gender_code']." selected>".$row['gender_name']."</option>";}
    else
        {echo "<option value=".$row['gender_code'].">".$row['gender_name']."</option>";}
    
  }
}
?>
</select><br><br>
Office Name<span class="mandatory">*</span>:<select
autocomplete="off" type="number" name="myofficecode"
id="myofficecode" value="<?php echo $myofficecode; ?>"><br><br>
<?php
$sql = "SELECT * FROM emp_office ORDER BY office_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['office_code']==$myofficecode)
        {echo "<option value=".$row['office_code']." selected>".$row['office_name']."</option>";}
    else
        {echo "<option value=".$row['office_code'].">".$row['office_name']."</option>";}
    
  }
}
?>
</select><br><br>
Photo (Only jpg, jpeg or png allowed!)<span class="mandatory">*</span>: <input type="file" name="myphoto" id="myphoto" accept="image/*"><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_button'])) {
    $id = test_input($_POST["id"]);
    $myelectionrolecode = test_input($_POST["myelectionrolecode"]);
    $myempid = test_input($_POST["myempid"]);
    $mycfmsid = test_input($_POST["mycfmsid"]);
    $myname = test_input($_POST["myname"]);
    $mydesignation = test_input($_POST["mydesignation"]);
    $myscaleofpay = test_input($_POST["myscaleofpay"]);
    $mybasicpay = test_input($_POST["mybasicpay"]);
    $mygazattedstatus = test_input($_POST["mygazattedstatus"]);
    $mydob = test_input($_POST["mydob"]);
    $myage = test_input($_POST["myage"]);
    $myworkingmandalcode = test_input($_POST["myworkingmandalcode"]);
    $mynativemandalcode = test_input($_POST["mynativemandalcode"]);
    $myresidencemandalcode = test_input($_POST["myresidencemandalcode"]);
    $mymobile = test_input($_POST["mymobile"]);
    $myemptypecode = test_input($_POST["myemptypecode"]);
    $mygendercode = test_input($_POST["mygendercode"]);
    $myofficecode = test_input($_POST["myofficecode"]);

// image upload code
$status = 'error'; 
    if(!empty($_FILES["myphoto"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["myphoto"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['myphoto']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
        }
      }else{$imgContent=NULL;}
if($imgContent != NULL){$sql = "UPDATE employee SET election_id = '".$id."',
  election_role_code = '".$myelectionrolecode."', emp_id = '".$myempid."',
  cfms_id = '".$mycfmsid."', name = '".$myname."', designation =
'".$mydesignation."', scale_of_pay = '".$myscaleofpay."', basic_pay =
'".$mybasicpay."', gazatted_status = '".$mygazattedstatus."', dob =
'".$mydob."', age = '".$myage."', working_mandal_code =
'".$myworkingmandalcode."', native_mandal_code =
'".$mynativemandalcode."', residence_mandal_code =
'".$myresidencemandalcode."', mobile = '".$mymobile."', emp_type_code =
'".$myemptypecode."', gender_code = '".$mygendercode."',  office_code
= '".$myofficecode."', myphoto = '".$imgContent."' WHERE employee.election_id ='".$id."'";
} else{
  $sql = "UPDATE employee SET election_id = '".$id."',
  election_role_code = '".$myelectionrolecode."', emp_id = '".$myempid."',
  cfms_id = '".$mycfmsid."', name = '".$myname."', designation =
'".$mydesignation."', scale_of_pay = '".$myscaleofpay."', basic_pay =
'".$mybasicpay."', gazatted_status = '".$mygazattedstatus."', dob =
'".$mydob."', age = '".$myage."', working_mandal_code =
'".$myworkingmandalcode."', native_mandal_code =
'".$mynativemandalcode."', residence_mandal_code =
'".$myresidencemandalcode."', mobile = '".$mymobile."', emp_type_code =
'".$myemptypecode."', gender_code = '".$mygendercode."',  office_code
= '".$myofficecode."' WHERE employee.election_id ='".$id."'"; 
}   
    if ($conn->query($sql) === TRUE) {
      echo "<span style='color:green'>Data has been updated
successfully!</span><br>";
    } else {
      echo "<span style='color:red'>Error: " . $sql . "<br>" .
$conn->error."</span><br>";
    }
}
?>
<span class="mandatory">*</span> I, declare that all the above filled in data is true to the best of my knowledge.<br><br>
<input id="update_button" name="update_button" type="submit" value="Update">
</form>
<div>
<br/>
<?php
echo "<table class='centered-table'>";
echo "<tr><th>Photo</th><th>Election Id</th><th>Election Role
</th><th>Emp Id</th><th>CFMS
Id</th><th>Name</th><th>Designation</th><th>Action</th></tr>";
if($_SESSION["election_role_code"]=="8" OR $_SESSION["election_role_code"]=="9" OR $_SESSION["election_role_code"]=="10" OR $_SESSION["election_role_code"]=="11" OR $_SESSION["election_role_code"]=="12"){
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
  JOIN `emp_type` ON `employee`.`emp_type_code` = `emp_type`.`emp_type_code` ORDER BY election_id";
} else {
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
WHERE election_id='".$_SESSION["election_id"]."' ORDER BY election_id";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo
"<tr><td><img height='110' width='80' src='data:image/jpg;charset=utf8;base64,".base64_encode($row['myphoto'])."'/></td><td>".$row['election_id']."</td><td>".$row['election_role']."</td><td>".$row['emp_id']."</td><td>".$row['cfms_id']."</td><td>".$row['name']."</td><td>".$row['designation']."</td><td>".edit_button($row['election_id'])."</td></tr>";
            $i++;
        }
} else {
    echo "<tr><td align='center' colspan='22'>(0 Results)</td></tr>";
}
$conn->close();
?>
</table>
<br>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>
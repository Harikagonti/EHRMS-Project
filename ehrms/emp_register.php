<?php include_once('include/db_connection/session_include.php'); ?>
<html>
<head>
<style><?php include_once('include/css/style_sheet.css'); ?></style>
<script><?php include_once('include/js/java_script.js');?>
</script>
</head>
<body>
<?php include_once('include/db_connection/db_connection.php'); ?>
<?php include_once('include/php/menu.php'); ?>
<br>
<h1 class="div-class">Employee Registration Form</h1>
<div class="div-class">
<table class="centered-table">
<form name="register" id="register" onsubmit="return employeevalidateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
<tr>
<td>      
Election Role Name<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<select  autocomplete="off" type="number" name="myelectionrolecode" id="myelectionrolecode" required>
<option value="0">--Select--</option> 
<?php
//Only admin can change election role
if($_SESSION["election_role_code"]=='12'){
  $sql = "SELECT * FROM election_role ORDER BY election_role_code ASC"; 
}else{
  $sql = "SELECT * FROM election_role WHERE election_role_code<8 ORDER BY election_role_id ASC";
}
//$sql = "SELECT * FROM election_role ORDER BY election_role_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['election_role_code'].">".$row['election_role']." - ".$row['detailed_election_role']."</option>";
  }
}
?>
</select>
</td>
</tr>
<tr>
<td>
Emp Id<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="myempid" id="myempid"  required>
</td>
</tr>
<tr>
<td>
CFMS Id<span class="mandatory">*</span>&nbsp; 
</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="mycfmsid" id="mycfmsid"  required>
</td>
</tr>
<tr>
<td>
Name<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="myname" id="myname"  required>
</td>
</tr>
<tr>
<td>
Designation<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="mydesignation" id="mydesignation" required>
</td>
</tr>
<tr>
<td>
Scale Of Pay<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="myscaleofpay" id="myscaleofpay"  required>
</td>
</tr>
<tr>
<td>
Basic Pay<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="mybasicpay" id="mybasicpay"  required>
</td>
</tr>
<tr>
<td>
Gazatted Status<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<select autocomplete="off" type="text" name="mygazattedstatus" id="mygazattedstatus" required>
<option value="0">--Select--</option>
  <option value="yes">Yes</option>
  <option value="no">No</option>
</select>
</td>
</tr>
<tr>
  <td>
    DOB<span class="mandatory">*</span>&nbsp; 
  </td>
  <td>:</td>
  <td>
    <input autocomplete="off" onfocusout="calculateAge()" type="date" name="mydob" id="mydob" required>
  </td>
</tr>
<tr>
  <td>
    Age<span class="mandatory">*</span>&nbsp;
  </td>
  <td>:</td>
  <td>
    <input autocomplete="off" type="number" name="myage" id="myage" required>
  </td>
</tr>
<tr>
<td>
Working Mandal Name<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<select autocomplete="off" type="number" name="myworkingmandalcode" id="myworkingmandalcode"  required>
<option value="0">--Select--</option>
<?php
$sql = "SELECT * FROM mandal ORDER BY mandal_name ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['mandal_code'].">".$row['mandal_name']."</option>";
  }
}
?>
</select>
</td></tr>
<tr><td>
Native Mandal Name<span class="mandatory">*</span>&nbsp; 
</td>
<td>:</td>
<td>
<select autocomplete="off" type="text" name="mynativemandalcode" id="mynativemandalcode"  required>
<option value="0">--Select--</option>
<?php
$sql = "SELECT * FROM mandal ORDER BY mandal_name ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['mandal_code'].">".$row['mandal_name']."</option>";
  }
}
?>
</select>
</td></tr>
<tr><td>
Residence Mandal Name<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<select autocomplete="off" type="text" name="myresidencemandalcode" id="myresidencemandalcode"  required>
<option value="0">--Select--</option>
<?php
$sql = "SELECT * FROM mandal ORDER BY mandal_name ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['mandal_code'].">".$row['mandal_name']."</option>";
  }
}
?>
</select>
</td></tr>
<tr><td>
Mobile<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<input autocomplete="off" type="text" name="mymobile" id="mymobile"  required>
</td></tr>
<tr>
<td>
Emp Type Name<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<select autocomplete="off" type="number" name="myemptypecode" id="myemptypecode"  required>
<option value="0">--Select--</option>
<?php
$sql = "SELECT * FROM emp_type ORDER BY emp_type_name ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['emp_type_code'].">".$row['emp_type_name']."</option>";
  }
}
?>
</select>
</td>
</tr>
<tr>
<td>
Gender Name<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>
<td>
<select autocomplete="off" type="text" name="mygendercode" id="mygendercode"  required>
<option value="0">--Select--</option>
<?php
$sql = "SELECT * FROM emp_gender ORDER BY gender_name ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['gender_code'].">".$row['gender_name']."</option>";
  }
}
?>
</select>
</td>
</tr>
<tr>
<td>
Office Name<span class="mandatory">*</span>&nbsp;
</td>
<td>:</td>

<td>
<select autocomplete="off" type="number" name="myofficecode" id="myofficecode"  required>
<option value="0">--Select--</option>
<?php
$sql = "SELECT * FROM emp_office ORDER BY office_name ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
echo "<option value=".$row['office_code'].">".$row['office_name']."</option>";
  }
}
?>
</select>
<tr>
  <td>Photo (Only jpg, jpeg or png allowed!)&nbsp;</td>
  <td>:</td>
  <td>
    <input type="file" name="myphoto" id="myphoto" accept="image/*" required>
  </td>
</tr>
</td></tr>
<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_button'])) {
    

    // Retrieve and sanitize form input values
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
      }
            // Insert image content into database 
            /* $insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', NOW())"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    }
*/

  

    // Validate select options
    if ($myelectionrolecode === '0' || $mygazattedstatus === '0' || $myworkingmandalcode === '0' || $mynativemandalcode === '0' || $myresidencemandalcode === '0' || $myemptypecode === '0' || $mygendercode === '0' || $myofficecode === '0') {
        echo "<span style='color:red'>Please select an option before submitting.</span><br>";
    }  else {
            // Prepare and execute the SQL INSERT query
            $sql = "INSERT INTO employee (election_id, password, election_role_code, myphoto, emp_id, cfms_id, name, designation, scale_of_pay, basic_pay, gazatted_status, dob, age, working_mandal_code, native_mandal_code, residence_mandal_code, mobile, emp_type_code, gender_code, office_code, client_ip_address) 
            VALUES ('', 'gpt123', '$myelectionrolecode','$imgContent', '$myempid', '$mycfmsid', '$myname', '$mydesignation', '$myscaleofpay', '$mybasicpay', '$mygazattedstatus', '$mydob', '$myage', '$myworkingmandalcode', '$mynativemandalcode', '$myresidencemandalcode', '$mymobile', '$myemptypecode', '$mygendercode', '$myofficecode', '" . $_SERVER['REMOTE_ADDR'] . "')";

            if ($conn->query($sql) === TRUE) {
                echo "<span style='color:green'>Data has been saved successfully!</span><br>";
            } else {
                echo "<span style='color:red'>Error: " . $sql . "<br>" . $conn->error . "</span><br>";
            }
        }
    }

?>

    
<tr>
  <td colspan="20"> <span class="mandatory">*</span> By Saving I, declare that all the above filled in data is true to the best of my knowledge.<br><br>
<input id="register_button" name="register_button" type="submit" value=" Save ">
</td>
</tr>

</form>
<div>
<br/>
</table>
<br>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>
<?php include_once('include/db_connection/session_include.php'); ?>
<?php
$id="";
$myofficecode="";
$myofficename="";
$mydeptcode="";
$myofficetypecode="";

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
<h1 class="div-class">Employee Office Details</h1>
<div class="div-class">
<form name="register" id="register" onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_button'])) {
    $sql = "SELECT * FROM emp_office WHERE office_id='".$_POST['row_id']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $id=$row['office_id'];
        $myofficecode=$row['office_code'];
        $myofficename=$row['office_name'];
        $mydeptcode=$row['dept_code'];
        $myofficetypecode=$row['office_type_code'];
    }
    }

?>

<input type="hidden" value="<?php echo $id; ?>" name="id" id="id"><br><br>
Office Code<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="number" name="myofficecode" id="myofficecode"
value="<?php echo $myofficecode; ?>"><br><br>
Office Name<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="myofficename" id="myofficename"
value="<?php echo $myofficename; ?>"><br><br>
Department Name<span class="mandatory">*</span>&nbsp;: <select
autocomplete="off" type="number" name="mydeptcode" id="mydeptcode"
value="<?php echo $mydeptcode; ?>"><br><br>
<?php
$sql = "SELECT * FROM emp_dept ORDER BY dept_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['dept_code']==$mydeptcode)
        {echo "<option value=".$row['dept_code']." selected>".$row['dept_name']."</option>";}
    else
        {echo "<option value=".$row['dept_code'].">".$row['dept_name']."</option>";}
    
  }
}
?>
</select><br><br>
Office Type Name<span class="mandatory">*</span>&nbsp;: <select
autocomplete="off" type="number" name="myofficetypecode" id="myofficetypecode"
value="<?php echo $myofficetypecode; ?>"><br><br>
<?php
$sql = "SELECT * FROM emp_office_type ORDER BY office_type_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['office_type_id']==$myofficetypecode)
        {echo "<option value=".$row['office_type_code']." selected>".$row['office_type_name']."</option>";}
    else
        {echo "<option value=".$row['office_type_code'].">".$row['office_type_name']."</option>";}
    
  }
}
?>
</select><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_button'])) {
    $id = test_input($_POST["id"]);
    $myofficecode = test_input($_POST["myofficecode"]);
    $myofficename = test_input($_POST["myofficename"]);
    $mydeptcode = test_input($_POST["mydeptcode"]);
    $myofficetypecode = test_input($_POST["myofficetypecode"]);

    $sql = "UPDATE emp_office SET office_code = '".$myofficecode."',
    office_name = '".$myofficename."',
    dept_code = '".$mydeptcode."',
    office_type_code = '".$myofficetypecode."' WHERE
emp_office.office_id ='".$id."'";
    if ($conn->query($sql) === TRUE) {
      echo "<span style='color:green'>Data has been updated
successfully!</span><br>";
    } else {
      echo "<span style='color:red'>Error: " . $sql . "<br>" .
$conn->error."</span><br>";
    }
}
?>

<input id="update_button" name="update_button" type="submit" value="Update">
</form>
<div>
<br/>

<?php
echo "<table class='centered-table'>";
echo "<tr><th>Office Id</th><th>Office Code
</th><th>Office Name</th><th>Department Name</th><th>Office Type
Name</th><th>Action</th></tr>";
//$sql = "SELECT * FROM emp_office ORDER BY office_id ASC";
$sql ="SELECT emp_office.office_id, emp_office.office_code, emp_office.office_name, emp_dept.dept_code, emp_dept.dept_name, emp_office_type.office_type_code, emp_office_type.office_type_name FROM emp_office, emp_dept, emp_office_type WHERE emp_office.dept_code=emp_dept.dept_code AND emp_office.office_type_code=emp_office_type.office_type_code ORDER BY emp_office.office_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo
"<tr><td>".$row['office_id']."</td><td>".$row['office_code']."</td><td>".$row['office_name']."</td><td>".$row['dept_name']."</td><td>".$row['office_type_name']."</td><td>".edit_button($row['office_id'])."</td></tr>";
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
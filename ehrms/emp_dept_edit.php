<?php
$id="";
$mydeptcode="";
$mydeptname="";
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
<h1 class="div-class">Edit Employee Department Details</h1>
<div class="div-class">
<form name="register" id="register" onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_button'])) {
    $sql = "SELECT * FROM emp_dept WHERE dept_id='".$_POST['row_id']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $id=$row['dept_id'];
        $mydeptcode=$row['dept_code'];
        $mydeptname=$row['dept_name'];
    }
    }

?>

<input type="hidden" value="<?php echo $id; ?>" name="id" id="id"><br>
Department Code<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="number" name="mydeptcode"
id="mydeptcode" value="<?php echo $mydeptcode; ?>"><br><br>
Department Name<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="mydeptname" id="mydeptname" value="<?php echo $mydeptname; ?>"><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_button'])) {
    $id = test_input($_POST["id"]);
    $mydeptcode = test_input($_POST["mydeptcode"]);
    $mydeptname = test_input($_POST["mydeptname"]);

    $sql = "UPDATE emp_dept SET dept_code = '".$mydeptcode."',
    dept_name = '".$mydeptname."'WHERE emp_dept.dept_id ='".$id."'";
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
echo "<tr><th>Department Id<th>Department Code
</th><th>Department Name</th><th>Action</th></tr>";
$sql = "SELECT * FROM emp_dept ORDER BY dept_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo
"<tr><td>".$row['dept_id']."</td><td>".$row['dept_code']."</td><td>".$row['dept_name']."</td><td>".edit_button($row['dept_id'])."</td></tr>";
            $i++;
        }
} else {
    echo "<tr><td align='center' colspan='22'>(0 Results)</td></tr>";
}
$conn->close();
?>
<table>
    <br>
    <?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>
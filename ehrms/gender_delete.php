<?php
    function delete_button($row_id){
        $btn="";
        $btn="<form onsubmit='return take_confirmation()'
name='delete'gender_id='delete'
action='".htmlspecialchars($_SERVER["PHP_SELF"])."'
method='POST'><input type='hidden' value='".$row_id."'
name='row_id'gender_id='row_id'><input value='Delete' type='submit'
name='delete_button'gender_id='delete_button'></form>";
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
<h1 class="div-class">Delete Employee Gender Details</h1>
<div class="div-class">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_button'])) {
    $delete_id=$_POST['row_id'];
    $sql = "DELETE FROM emp_gender WHERE emp_gender.gender_id ='".$delete_id."'";
    if ($conn->query($sql) === TRUE) {
        echo "<span style='color:green'>Record has been deleted
successfully!</span><br>";
    } else {
    echo "<span style='color:red'>Error: " . $sql . "<br>" .
$conn->error."</span><br>";
    }
}
?>
<br/>
<?php
echo "<table class='centered-table'>";
echo "<tr><th>Gender Id</th><th>Gender Code</th><th>Gender Name</th><th>Action</th></tr>";
$sql = "SELECT * FROM emp_gender ORDER BY gender_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['gender_id']."</td><td>".$row['gender_code']."</td><td>".$row['gender_name']."</td><td>".delete_button($row['gender_id'])."</td></tr>";
            $i++;
        }
} else {
    echo "<tr><td align='center' colspan='5'>(0 Results)</td></tr>";
}
$conn->close();
?>
</table>
<br>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>
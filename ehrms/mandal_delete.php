<?php 
    function delete_button($row_id){
        $btn="";
        $btn="<form onsubmit='return take_confirmation()' name='delete'mandal_id='delete' action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='POST'><input type='hidden' value='".$row_id."' name='row_id'mandal_id='row_id'><input value='Delete' type='submit' name='delete_button'mandal_id='delete_button'></form>";
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
<h1 class="div-class">Delete Mandal Details</h1>
<div class="div-class">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_button'])) {
    $delete_id=$_POST['row_id'];
    $sql = "DELETE FROM mandal WHERE mandal.mandal_id ='".$delete_id."'";
    if ($conn->query($sql) === TRUE) {
        echo "<span style='color:green'>Record has been deleted successfully!</span><br>";
    } else {
    echo "<span style='color:red'>Error: " . $sql . "<br>" . $conn->error."</span><br>";
    }
}
?>
<br/>
<?php
echo "<table class='centered-table'>";
echo "<tr><th>Mandal Id</th><th>Mandal Code</th><th>Mandal Name</th><th>Division Name</th><th>Action</th></tr>";
$sql = "SELECT `mandal`.`mandal_id`,`mandal`.`mandal_code`,`mandal`.`mandal_name`,`mandal`.`division_code`, `division`.`division_name` FROM `mandal`,`division` WHERE `mandal`.`division_code`=`division`.`division_code` ORDER BY `mandal`.`mandal_id` ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['mandal_id']."</td><td>".$row['mandal_code']."</td><td>".$row['mandal_name']."</td><td>".$row['division_name']."</td><td>".delete_button($row['mandal_id'])."</td></tr>";
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

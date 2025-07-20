<?php
$id="";
$mymandalcode="";
$mymandalname="";
$mydivisioncode="";
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
<h1 class="div-class">Edit Mandal Details</h1>
<div class="div-class">
<form name="register" id="register" onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_button'])) {
    $sql = "SELECT * FROM mandal WHERE mandal_id='".$_POST['row_id']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $id=$row['mandal_id'];
        $mymandalcode=$row['mandal_code'];
        $mymandalname=$row['mandal_name'];
        $mydivisioncode=$row['division_code'];
    }
    }

?>

<input type="hidden" value="<?php echo $id; ?>" name="id" id="id"><br><br>
Mandal Code<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="number" name="mymandalcode" id="mymandalcode"
value="<?php echo $mymandalcode; ?>"><br><br>
Mandal Name<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="mymandalname" id="mymandalname"
value="<?php echo $mymandalname; ?>"><br><br>
Division Name<span class="mandatory">*</span>&nbsp;: <select
autocomplete="off" type="number" name="mydivisioncode" id="mydivisioncode"
value="<?php echo $mydivisioncode; ?>"><br><br>
<?php
$sql = "SELECT * FROM division ORDER BY division_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['division_code']==$mydivisioncode)
        {echo "<option value=".$row['division_code']." selected>".$row['division_name']."</option>";}
    else
        {echo "<option value=".$row['division_code'].">".$row['division_name']."</option>";}
    
  }
}
?>
</select><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_button'])) {
    $id = test_input($_POST["id"]);
    $mymandalcode = test_input($_POST["mymandalcode"]);
    $mymandalname = test_input($_POST["mymandalname"]);
    $mydivisioncode = test_input($_POST["mydivisioncode"]);

    $sql = "UPDATE mandal SET mandal_code = '".$mymandalcode."',
mandal_name = '".$mymandalname."',
    division_code = '".$mydivisioncode."' WHERE mandal.mandal_id ='".$id."'";
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
echo "<tr><th>Mandal Id</th><th>Mandal Code
</th><th>Mandal Name</th><th>Division Name</th><th>Action</th></tr>";
$sql ="SELECT mandal.mandal_id, mandal.mandal_code, mandal.mandal_name, division.division_name FROM mandal, division WHERE mandal.division_code=division.division_code ORDER BY mandal.mandal_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo
"<tr><td>".$row['mandal_id']."</td><td>".$row['mandal_code']."</td><td>".$row['mandal_name']."</td><td>".$row['division_name']."</td><td>".edit_button($row['mandal_id'])."</td></tr>";
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


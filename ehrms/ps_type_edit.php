<?php
$id="";
$mypstypecode="";
$mypstypename="";
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
<br>
<h1 class="div-class">Edit Polling Station Type</h1>
<div class="div-class">
<form name="register" id="register" onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_button'])) {
    $sql = "SELECT * FROM ps_type WHERE ps_type_id='".$_POST['row_id']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $id=$row['ps_type_id'];
        $mypstypecode=$row['ps_type_code'];
        $mypstypename=$row['ps_type_name'];
    }
    }

?>

<input type="hidden" value="<?php echo $id; ?>" name="id" id="id"><br>
Polling Station Type Code<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="number" name="mypstypecode"
id="mypstypecode" value="<?php echo $mypstypecode; ?>"><br><br>
Polling Station Name<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="mypstypename" id="mypstypename" value="<?php echo $mypstypename; ?>"><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_button'])) {
    $id = test_input($_POST["id"]);
    $mypstypecode = test_input($_POST["mypstypecode"]);
    $mypstypename = test_input($_POST["mypstypename"]);

    $sql = "UPDATE ps_type SET ps_type_code = '".$mypstypecode."',
    ps_type_name = '".$mypstypename."'WHERE ps_type.ps_type_id ='".$id."'";
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
echo "<tr><th>Polling Station Type Id<th>Polling Station Type Code
</th><th>Polling Station Type Name</th><th>Action</th></tr>";
$sql = "SELECT * FROM ps_type ORDER BY ps_type_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo
"<tr><td>".$row['ps_type_id']."</td><td>".$row['ps_type_code']."</td><td>".$row['ps_type_name']."</td><td>".edit_button($row['ps_type_id'])."</td></tr>";
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

<?php
$id="";
$myelectionrolecode="";
$myelectionrole="";
$mydetailedelectionrole="";
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
<h1 class="div-class">Edit Election Role Details</h1>
<div class="div-class">
<form name="register" id="register" onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_button'])) {
    $sql = "SELECT * FROM election_role WHERE election_role_id='".$_POST['row_id']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $id=$row['election_role_id'];
        $myelectionrolecode=$row['election_role_code'];
        $myelectionrole=$row['election_role'];
        $mydetailedelectionrole=$row['detailed_election_role'];
    }
    }

?>

<input type="hidden" value="<?php echo $id; ?>" name="id" id="id"><br><br>
Election Role Code<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="number" name="myelectionrolecode" id="myelectionrolecode"
value="<?php echo $myelectionrolecode; ?>"><br><br>
Election Role<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="myelectionrole" id="myelectionrole"
value="<?php echo $myelectionrole; ?>"><br><br>
Detailed Election Role<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="mydetailedelectionrole" id="mydetailedelectionrole"
value="<?php echo $mydetailedelectionrole; ?>"><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_button'])) {
    $id = test_input($_POST["id"]);
    $myelectionrolecode = test_input($_POST["myelectionrolecode"]);
    $myelectionrole = test_input($_POST["myelectionrole"]);
    $mydetailedelectionrole = test_input($_POST["mydetailedelectionrole"]);

    $sql = "UPDATE election_role SET election_role_code = '".$myelectionrolecode."',
    election_role = '".$myelectionrole."',
    detailed_election_role = '".$mydetailedelectionrole."' WHERE election_role.election_role_id ='".$id."'";
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
echo "<tr><th>Election Role Id</th><th>Election Role Code
</th><th>Election Role</th><th>Detailed Election Role</th><th>Action</th></tr>";
$sql = "SELECT * FROM election_role ORDER BY election_role_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo
"<tr><td>".$row['election_role_id']."</td><td>".$row['election_role_code']."</td><td>".$row['election_role']."</td><td>".$row['detailed_election_role']."</td><td>".edit_button($row['election_role_id'])."</td></tr>";
            $i++;
        }
} else {
    echo "<tr><td align='center' colspan='22'>(0 Results)</td></tr>";
}
$conn->close();
?>
<table>
    <br/>
<?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>

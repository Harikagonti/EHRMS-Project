<?php
$id="";
$mypscode="";
$mypsmandalcode="";
$mypsdivisoncode="";
$mypsconstituencycode="";
$mypsno="";
$mypsname="";
$mynoofvoters="";
$myallotfalg="";
$mypstypecode="";
$mydistributioncenter="";
$mydistributionreporting="";
$myreceptioncenter="";
$myreceptionreporting="";
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
<h1 class="div-class" style="color:blue">Edit Polling Station Details</h1>
<div class="div-class">
<form name="register" id="register" onsubmit="return
validate(document)" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_button'])) {
    $sql = "SELECT * FROM polling_station WHERE ps_id='".$_POST['row_id']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $id=$row['ps_id'];;
        $mypscode=$row['ps_code'];;
        $mypsmandalcode=$row['ps_mandal_code'];;
        $mypsdivisoncode=$row['ps_division_code'];;
        $mypsconstituencycode=$row['ps_constituency_code'];;
        $mypsno=$row['ps_no'];;
        $mypsname=$row['ps_name'];;
        $mynoofvoters=$row['no_of_voters'];;
        $myallotfalg=$row['allot_flag'];;
        $mypstypecode=$row['ps_type_code'];;
        $mydistributioncenter=$row['distribution_center'];;
        $mydistributionreporting=$row['distribution_reporting'];;
        $myreceptioncenter=$row['reception_center'];;
        $myreceptionreporting=$row['reception_reporting'];;
    }
    }

?>

<input type="hidden" value="<?php echo $id; ?>" name="id" id="id">
<br>
Polling Station Code<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="number" name="mypscode" id="mypscode"
value="<?php echo $mypscode; ?>"><br><br>
Polling Station Mandal Name<span class="mandatory">*</span>:<select
autocomplete="off" type="number" name="mypsmandalcode"
id="mypsmandalcode" value="<?php echo $mypsmandalcode; ?>"><br><br>
<?php
$sql = "SELECT * FROM mandal ORDER BY mandal_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['mandal_code']==$mypsmandalcode)
        {echo "<option value=".$row['mandal_code']." selected>".$row['mandal_name']."</option>";}
    else
        {echo "<option value=".$row['mandal_code'].">".$row['mandal_name']."</option>";}
    
  }
}
?>
</select><br><br>
Polling Station Division Name<span class="mandatory">*</span>:<select
autocomplete="off" type="number" name="mypsdivisioncode"
id="mypsdivisioncode" value="<?php echo $mypsdivisioncode; ?>"><br><br>
<?php
$sql = "SELECT * FROM division ORDER BY division_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['division_code']==$mypsdivisioncode)
        {echo "<option value=".$row['division_code']." selected>".$row['division_name']."</option>";}
    else
        {echo "<option value=".$row['division_code'].">".$row['division_name']."</option>";}
    
  }
}
?>
</select><br><br>
Polling Station Constituency Name<span class="mandatory">*</span>:<select
autocomplete="off" type="number" name="mypsconstituencycode"
id="mypsconstituencycode" value="<?php echo $mypsconstituencycode; ?>"><br><br>
<?php
$sql = "SELECT * FROM constituency ORDER BY ps_constituency_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['ps_constituency_code']==$mypsconstituencycode)
        {echo "<option value=".$row['ps_constituency_code']." selected>".$row['ps_constituency_name']."</option>";}
    else
        {echo "<option value=".$row['ps_constituency_code'].">".$row['ps_constituency_name']."</option>";}
    
  }
}
?>
</select><br><br>
Polling Station No<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="mypsno" id="mypsno"
value="<?php echo $mypsno; ?>"><br><br>
Polling Station Name<span class="mandatory">*</span>&nbsp;: <input
autocomplete="off" type="text" name="mypsname" id="mypsname"
value="<?php echo $mypsname; ?>"><br><br>
No Of Voters<span class="mandatory">*</span>:<input
autocomplete="off" type="number" name="mynoofvoters"
id="mynoofvoters" value="<?php echo $mynoofvoters; ?>"><br><br>
Allot Flag<span class="mandatory">*</span>:
        <input autocomplete="off" type="text" name="myallotflag" id="myallotflag" ><br><br>
Polling Station Type Name<span class="mandatory">*</span>:<select
autocomplete="off" type="number" name="mypstypecode"
id="mypstypecode" value="<?php echo $mypstypecode; ?>"><br><br>
<?php
$sql = "SELECT * FROM ps_type ORDER BY ps_type_id ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['ps_type_code']==$mypstypecode)
        {echo "<option value=".$row['ps_type_code']." selected>".$row['ps_type_name']."</option>";}
    else
        {echo "<option value=".$row['ps_type_code'].">".$row['ps_type_name']."</option>";}
    
  }
}
?>
</select><br><br>
Distribution Center<span class="mandatory">*</span>:<input
autocomplete="off" type="text" name="mydistributioncenter"
id="mydistributioncenter" value="<?php echo $mydistributioncenter; ?>"><br><br>
Distribution Reporting<span class="mandatory">*</span>:<input
autocomplete="off" type="text" name="mydistributionreporting"
id="mydistributionreporting" value="<?php echo $mydistributionreporting; ?>"><br><br>
Reception Center<span class="mandatory">*</span>:<input
autocomplete="off" type="text" name="myreceptioncenter"
id="myreceptioncenter" value="<?php echo $myreceptioncenter; ?>"><br><br>
Reception Reporting<span class="mandatory">*</span>:<input
autocomplete="off" type="text" name="myreceptionreporting"
id="myreceptionreporting" value="<?php echo $myreceptionreporting; ?>"><br><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_button'])) {
    $id = test_input($_POST["id"]);
    $mypscode = test_input($_POST["mypscode"]);
    $mypsmandalcode = test_input($_POST["mypsmandalcode"]);
    $mypsdivisioncode = test_input($_POST["mypsdivisioncode"]);
    $mypsconstituencycode = test_input($_POST["mypsconstituencycode"]);
    $mypsno = test_input($_POST["mypsno"]);
    $mypsname = test_input($_POST["mypsname"]);
    $mynoofvoters = test_input($_POST["mynoofvoters"]);
    $myallotflag = test_input($_POST["myallotflag"]);
    $mypstypecode = test_input($_POST["mypstypecode"]);
    $mydistributioncenter = test_input($_POST["mydistributioncenter"]);
    $mydistributionreporting = test_input($_POST["mydistributionreporting"]);
    $myreceptioncenter = test_input($_POST["myreceptioncenter"]);
    $myreceptionreporting = test_input($_POST["myreceptionreporting"]);

    $sql = "UPDATE polling_station SET ps_id = '".$id."',
    ps_code = '".$mypscode."', ps_mandal_code = '".$mypsmandalcode."',
    ps_division_code = '".$mypsdivisioncode."', ps_constituency_code = '".$mypsconstituencycode."', ps_no =
'".$mypsno."', ps_name = '".$mypsname."', no_of_voters =
'".$mynoofvoters."', allot_flag = '".$myallotflag."', ps_type_code =
'".$mypstypecode."', distribution_center = '".$mydistributioncenter."', distribution_reporting =
'".$mydistributionreporting."', reception_center =
'".$myreceptioncenter."', reception_reporting =
'".$myreceptionreporting."' WHERE polling_station.ps_id ='".$id."'";
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
echo "<tr><th>Polling Station Id<th>Polling Station Code
</th><th>Polling Station Mandal Code</th><th>Polling Station Mandal Name</th><th>Polling Station Division Code</th><th>Polling Station Mandal Name</th><th>Polling Station Constituency Code</th><th>Polling Station Constituency Name</th><th>Polling Station No</th><th>polling station Name</th><th>No Of Voters</th><th>Allot Flag</th>
<th>Polling Station Type Code</th><th>Polling Station Type Name</th><th>Distribution Center</th><th>Distribution Reporting</th><th>Reception Center</th><th>Reception Reporting</th><th>Action</th></tr>";
$sql = "SELECT
`polling_station`.`ps_id`,
`polling_station`.`ps_code`,
`polling_station`.`ps_mandal_code`,
`mandal`.`mandal_name`,
`polling_station`.`ps_division_code`,
`division`.`division_name`,
`polling_station`.`ps_constituency_code`,
`constituency`.`ps_constituency_name`,
`polling_station`.`ps_no`,
`polling_station`.`ps_name`,
`polling_station`.`no_of_voters`,
`polling_station`.`allot_flag`,
`polling_station`.`ps_type_code`,
`ps_type`.`ps_type_name`,
`polling_station`.`distribution_center`,
`polling_station`.`distribution_reporting`,
`polling_station`.`reception_center`,
`polling_station`.`reception_reporting`
FROM 
`polling_station`
JOIN 
`mandal` ON `polling_station`.`ps_mandal_code` = `mandal`.`mandal_code`
JOIN 
`division` ON `polling_station`.`ps_division_code` = `division`.`division_code`
JOIN 
`constituency` ON `polling_station`.`ps_constituency_code` = `constituency`.`ps_constituency_code`
JOIN 
`ps_type` ON `polling_station`.`ps_type_code` = `ps_type`.`ps_type_code`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $i=1;
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo
"<tr><td>".$row['ps_id']."</td><td>".$row['ps_code']."</td><td>".$row['ps_mandal_code']."</td><td>".$row['mandal_name']."</td><td>".$row['ps_division_code']."</td><td>".$row['ps_constituency_code']."</td><td>".$row['ps_constituency_name']."</td><td>".$row['ps_no']."</td><td>".$row['ps_name']."</td><td>".$row['no_of_voters']."</td><td>".$row['allot_flag']."</td><td>".$row['ps_type_code']."</td><td>".$row['ps_type_name']."</td><td>".$row['distribution_center']."</td><td>".$row['distribution_reporting']."</td>
<td>".$row['distribution_reporting']."</td><td>".$row['reception_center']."</td><td>".$row['reception_reporting']."</td><td>".edit_button($row['ps_id'])."</td></tr>";
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
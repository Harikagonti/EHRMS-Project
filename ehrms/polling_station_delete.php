<?php
    function delete_button($row_id){
        $btn="";
        $btn="<form onsubmit='return take_confirmation()' name='delete' action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='POST'><input type='hidden' value='".$row_id."' name='row_id'><input value='Delete' type='submit' name='delete_button'></form>";
        return $btn;
    }
?>

<?php include_once('include/db_connection/session_include.php'); ?>

<html>
<head>
    <style>
        <?php include_once('include/css/style_sheet.css'); ?>
        table.centered-table {
            margin: auto;
        }
    </style>
    <script>
        <?php include_once('include/js/java_script.js');?>
    </script>
</head>
<body>
    <?php include_once('include/db_connection/db_connection.php'); ?>
    <?php include_once('include/php/menu.php'); ?>
    
    <br>
    <h1 class="div-class" style="color:blue">Delete Gender Registration Details</h1>
    
    <div class="div-class">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_button'])) {
            $delete_id = $_POST['row_id'];
            $sql = "DELETE FROM polling_station WHERE polling_station.ps_id ='".$delete_id."'";
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
        echo "<tr><th>Ps Id</th><th>Ps code</th><th>Ps Mandal code</th><th>Ps Division code</th><th>Ps Constituency code</th><th>Ps No</th><th>Ps Name</th><th>No Of Voters</th><th>Allot Flag</th><th>Action</th></tr>";
        $sql = "SELECT * FROM polling_station ORDER BY ps_id ASC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $i = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['ps_id']."</td><td>".$row['ps_code']."</td><td>".$row['ps_mandal_code']."</td><td>".$row['ps_division_code']."</td><td>".$row['ps_constituency_code']."</td><td>".$row['ps_no']."</td><td>".$row['ps_name']."</td><td>".$row['no_of_voters']."</td><td>".$row['allot_flag']."</td><td>".delete_button($row['ps_id'])."</td></tr>";
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

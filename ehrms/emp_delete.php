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
    </style>
    <script>
        <?php include_once('include/js/java_script.js');?>
    </script>
</head>
<body>
    <?php include_once('include/db_connection/db_connection.php'); ?>
    <?php include_once('include/php/menu.php'); ?>
    
    <h1 class="div-class">Delete Employee Details</h1>
    
    <div class="div-class">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_button'])) {
            $delete_id = $_POST['row_id'];
            $sql = "DELETE FROM employee WHERE employee.election_id ='".$delete_id."'";
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
        echo "<tr><th>Election ID</th><th>Employee Code</th><th>CFMS ID</th><th>Name</th><th>Designation</th><th>Action</th></tr>";
        
        $sql = "SELECT `employee`.`election_id`, `employee`.`election_role_code`, `employee`.`emp_id`, `employee`.`cfms_id`, `employee`.`name`, `employee`.`designation` FROM `employee`";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['election_id']."</td><td>".$row['emp_id']."</td><td>".$row['cfms_id']."</td><td>".$row['name']."</td><td>".$row['designation']."</td><td>".delete_button($row['election_id'])."</td></tr>";  
            }
        } else {
            echo "<tr><td align='center' colspan='6'>(0 Results)</td></tr>";
        }
        
        $conn->close();
        ?>
    </table>
    </br>
    <?php include_once('include/php/footer_menu.php'); ?>
</body>
</html>

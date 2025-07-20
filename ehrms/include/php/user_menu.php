<?php
echo "<nav id='cssmenu'>";
echo "<div class='logo'><a href='home.php'><image src='include/img/ehrms_logo.png' width='20%'/></a></div>";
//echo "<div id='head-mobile'></div>";
//echo "<div class='button'></div>";
echo "<ul>";
echo "<li class='".active('home')."'><a href='home.php'>HOME</a></li>";
echo "<li class='".active('about')."'><a href='about.php'>ABOUT</a></li>";
echo "<li class='".active('emp_register').active('emp_view').active('emp_edit').active('emp_delete')."'><a href='#'>EMPLOYEE DATA</a>";
   echo "<ul>";
   echo "<li class='".active('emp_view')."'><a href='emp_view.php' Value='View'>View</a></li>";
   echo "<li class='".active('emp_edit')."'><a href='emp_edit.php' Value='Edit'>Edit</a></li>";
   echo "</ul>";
echo "</li>";
echo "<li class='".active('')."'><a href='contact.php'>CONTACT</a></li>";
if(isset($_SESSION["election_id"])){
   echo "<li class='".active('change_password').active('logout')."'><a href='#'>ACCOUNT</a>";
      echo "<ul>";
      echo "<li class='".active('change_password')."'><a href='change_password.php'>Change Password</a></li>";
      echo "<li class='".active('logout')."'><a href='logout.php'>Logout</a></li>";
      echo "</ul>";
   echo "</li>";
   }

//if(isset($_SESSION["election_id"])){echo "<li><a href='logout.php'>LOGOUT</a></li>";}
echo "</ul>";
echo "</nav>";
echo "<nav>";
echo "<p align='right'><a href='emp_view.php'>User Name: ".$_SESSION["name"]."</a></p>";
echo "</nav>";
?>
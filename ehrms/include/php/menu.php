<?php
function active($active)
{
   $current_page=basename($_SERVER['PHP_SELF']); 
   $current_page =substr($current_page,0,-4);
   if ($active==$current_page) 
   {
      return 'active';
   }
}

if($_SESSION["election_role_code"]=="8") {include_once('include/php/admin_menu.php'); }
else if($_SESSION["election_role_code"]=='9') {include_once('include/php/admin_menu.php'); }
else if($_SESSION["election_role_code"]=='10') {include_once('include/php/admin_menu.php'); }
else if($_SESSION["election_role_code"]=='11') {include_once('include/php/admin_menu.php'); }
else if($_SESSION["election_role_code"]=='12') {include_once('include/php/admin_menu.php'); }
else {include_once('include/php/user_menu.php'); }

?>
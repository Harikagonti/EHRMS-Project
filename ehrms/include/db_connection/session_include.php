<?php
session_start();
if(!(isset($_SESSION["election_id"]) && isset($_SESSION["mobile"]) && isset($_SESSION["election_role_code"]) && isset($_SESSION["name"]) && ($_SESSION["login_role"] == "ADMIN")))
{ header('Location: index.php'); }
?>
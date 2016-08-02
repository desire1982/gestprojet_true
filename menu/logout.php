<?php
session_start();
if(isset($_GET['deconnecter']))
{
 session_destroy();
// unset($_SESSION['login']);
// unset($_SESSION['NIV']);
 
 session_unset();
 
 header("Location: index.php");
}

?>
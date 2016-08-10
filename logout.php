<?php
include('config/connect.php');
session_start();
if(isset($_GET['deconnecter']))
{
 // On met à (0) zero etat connecté
 $stmt = $mysqli->prepare("UPDATE tbl_user SET connecte = ? WHERE id_user = ?");
   
    $stmt->bind_param('ss', $etat_connecte, $id_users);
 
          $etat_connecte = '0';
		  $id_users = $_SESSION['id_user_ss'] ;
         
	if($stmt->execute()){
		
		session_destroy();
// unset($_SESSION['login']);
// unset($_SESSION['NIV']);
 
 session_unset();
 
 header("Location: index.php");
		
               
		  }else{
               echo "<script>alert('".$stmt->error."')</script>";
			   exit;
		  }
	// Fin de l'ajout connection
 
 
}

?>
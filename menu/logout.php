<?php
session_start();


if(isset($_GET['deconnecter']))
{
	// On insère la date de la connextion et l'adresse ip du poste connecter
	//$sql_insert = "";
	$stmt = $mysqli->prepare("UPDATE tbl_user SET  connecte = ? WHERE id_user = ?");
   
    $stmt->bind_param('ss', $tl, $id_users);
 
          $tl = '0';
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
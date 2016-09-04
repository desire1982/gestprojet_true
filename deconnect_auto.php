<?php
//session_start();
//$_SESSION['login_time'] = time();
if(session_id() == ""){
  session_start();
	 }
	 
if(isset($_SESSION['login_time'])){
	
	include('config/connect.php');
	
				   
	if((time() - $_SESSION['login_time']) > 200){
		
		// On met à (0) zero etat connecté
 $stmt = $mysqli->prepare("UPDATE tbl_user SET connecte = ? WHERE id_user = ?");
   
    $stmt->bind_param('ss', $etat_connecte, $id_users);
 
          $etat_connecte = '0';
		  $id_users = $_SESSION['id_user_ss'] ;
         
	if($stmt->execute()){
		
session_unset();     // unset $_SESSION variable for the run-time 
session_destroy();
session_start();
//echo 'vous etes deconnecter';

header("Location: index.php");
//echo'<script type="text/javascript">alert('Vous vous etes deconnecté');

}
	}
				   }
$_SESSION['login_time']=time();

?>

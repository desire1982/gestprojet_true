<?php 
include('../config/connect.php'); 

$pro=$_POST['pro'];
$id_destination=$_POST['id_destination'];
$lib_destination=$_POST['lib_destination'];
$nature_projet=$_POST['nature_projet'];
$resp_projet=$_POST['resp_projet'];
$date_destination=$_POST['date_destination'];
$dure_projet=$_POST['dure_projet'];
$date_creation_dest=$_POST['date_creation_dest'];
$utilisateur_connecte=$_POST['utilisateur_connecte'];
$ndate_destination=date('Y-m-d', strtotime($date_destination));
//var_dump($_POST);

switch($pro){ 

case 'enregistrer':

 $sql_affiche="INSERT INTO tbl_destination(destination,lib_destination, nature_projet, responsable_prjt, date_demarrage_prjt, duree_prjt,dest_enregistre_le,dest_enregistre_par) VALUES('$id_destination','$lib_destination','$nature_projet','$resp_projet','$ndate_destination','$dure_projet','$date_creation_dest','$utilisateur_connecte')";
// var_dump($sql_affiche);

$res_affiche=$mysqli->query("$sql_affiche");

break;

case 'editer':
$sql_affiche="UPDATE tbl_destination SET  destination='$id_destination', lib_destination='$lib_destination' WHERE destination='$id_destination'";
$res_affiche=$mysqli->query("$sql_affiche");
//if($res_affiche){
//    echo "Editer avec succès";
//  } else{
//    echo "Fail";
//  }
break;
}
$sql_affiche1="SELECT * FROM tbl_destination ORDER BY destination ASC"

?>
 <?php
 echo 	 '<table class="table table-striped table-condensed table-hover">
     <tr>
     <th width="300"> destination </th>
     <th width="200"> libel destination </th>
     <th width="200"> option </th>
     </tr>';
     
     
	  $res_affiche1=$mysqli->query("$sql_affiche1");   
	   
	   while($row = $res_affiche1->fetch_assoc()){
	   
	    
       
echo'<tr><td>'.$row['destination'].'</td>
<td>'.$row['lib_destination'].'</td>
<td ><button class="btn btn-primary" onclick="editerDestination('.$row['destination'].')">Editer</button><button class="btn btn-primary" onclick="eliminerDestination('.$row['destination'].')">Supprimer</button><a href="javascript:eliminerDestination('.$row['destination'].')" class="glyphicon glyphicon-remove-circle"></a></td> 
</tr>';

  
	   }
	   ?>
      
</table>
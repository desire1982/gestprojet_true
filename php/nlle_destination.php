<?php
include('../config/connectmysql.php');
$destination=$_POST['destinati'];
$libelle_destination=$_POST['lib_destination'];
//var_dump($_POST);


$sql="SELECT * FROM tbl_destination WHERE destination ='$destination'";

$resultat=mysql_query("$sql");

$nombre = mysql_num_rows($resultat);

if($nombre == 0){
    $sql_insert="INSERT INTO tbl_destination(destination, lib_destination) VALUES('$destination','$libelle_destination')";
   $result=mysql_query("$sql_insert");
	
	$sql_enr ="SELECT * FROM tbl_destination WHERE destination ='$destination'";
	
	$resultat1=mysql_query("$sql_enr");
	$tabdata = array();

while ($row = mysql_fetch_assoc($resultat1)) {
    $tabdata[] = $row;
   // print_r($tabdata);
}

echo json_encode($tabdata);

  //  echo('bien');
//$_SESSION['code_projet']=$code_projet;
//$_SESSION['source_financement']=$source_financement;

//  $resultat1=mysql_query("SELECT * FROM tbl_dotation_projet WHERE destination_fk ='".$code_projet."' AND date_dotation='".$annee."'");

//    echo '<table class="table table-striped table-condensed table-hover" >
//<tr>
//<td>DESTINATION</td>
//<td>NATURE</td>
//<td>ANNEE</td>
//<td>MONTANT</td>
//<td>OPTION</td>
//</tr>';
//    while ($donnee = mysql_fetch_array($resultat1)){
//        echo '<tr><td>'.$donnee['destination_fk'].'</td>';
//        echo '<td>'.$donnee['nature_fk'].'</td>';
//        echo '<td>'.$donnee['date_dotation'].'</td>';
//        echo '<td>'.$donnee['montant_dotation'].'</td>';
//        echo '<td><input type="button" class="supprimer" id="'.$donnee['id_dotation'].'" value="Supprimer" "> </td></tr>';
//    }
//    echo'</table>';

}else{
    echo 'non enregistre';
}
?>
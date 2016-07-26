<?php 
include('../config/connectmysql.php'); 
$code_dossier=$_POST['code_dossier'];
$Etat_dossier=$_POST['Etat_dossier'];
$sourceStructure=$_POST['sourceStructure'];
$date_dossier=$_POST['date_dossier'];
$observation=$_POST['observation'];


$ndate_dossier=date('Y-m-d',strtotime($date_dossier));
//$ncode_dossier = $code_dossier.'-'.$code_dossier_num;
//var_dump($_POST);
//print_r($financement);


$sql="SELECT * FROM tbl_niveau_execution_prjt_mrche WHERE Code_dossier_prjt_mrche_fk ='$code_dossier' AND Code_structure_fk='$sourceStructure' AND Date_Etat='$ndate_dossier' AND Etat_traitement='$Etat_dossier'";
//
//echo $sql;
$resultat=mysql_query("$sql");
//var_dump($resultat);
//exit();
$nombre = mysql_num_rows($resultat);

if($nombre == 0){
	$sql_insert="INSERT INTO tbl_niveau_execution_prjt_mrche(Id_passer, Code_dossier_prjt_mrche_fk, Code_structure_fk, Date_Etat, Etat_traitement, Observation) VALUES('','$code_dossier','$sourceStructure','$ndate_dossier','$Etat_dossier','$observation')";
$result=mysql_query("$sql_insert");

//$_SESSION['code_projet']=$code_projet;
//$_SESSION['source_financement']=$source_financement;
//$sql_enr ="SELECT * FROM tbl_dossier_prjt_marche WHERE Code_dossier_prjt_marche ='$ncode_dossier'";


/*$resultat1=mysql_query("$sql_enr");
echo '<table class="table table-striped table-condensed table-hover" >
<tr>
<td>DESTINATION</td>
<td>NATURE</td>
<td>SOURCE</td>
<td>ANNEE</td>
<td>MONTANT</td>
<td>OPTION</td>
</tr>';
while ($donnee = mysql_fetch_array($resultat1)){
	echo '<tr><td>'.$donnee['Code_dossier_prjt_marche'].'</td>';
	echo '<td>'.$donnee['Code_origine_fk'].'</td>';
	echo '<td>'.$donnee['Destination_fk'].'</td>';
	echo '<td>'.$donnee['Objet_prjt_mrche'].'</td>';
	echo '<td>'.number_format($donnee['Montant_projet_mrche'],0,","," ").'</td>';
echo '<td><input type="button" class="supprimer" id="'.$donnee['Code_dossier_prjt_marche'].'" value="Supprimer" "> </td></tr>';


}
echo'</table>';*/

}else{
echo 'existe';

}
?>
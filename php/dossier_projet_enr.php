<?php 
include('../config/connectmysql.php'); 
$code_dossier=$_POST['code_dossier'];
$code_dossier_num=$_POST['code_dossier_num'];
$origine=$_POST['origine'];
$projet=$_POST['projet'];
$objet_dossier=$_POST['objet_dossier'];
$attributaire=$_POST['attributaire'];
$financement=$_POST['financement'];
$montant_finan_prjt_marche=$_POST['montant_finan_prjt_marche'];
$date_reception=$_POST['date_reception'];

$ndate_reception=date('Y-m-d',strtotime($date_reception));
$ncode_dossier = $code_dossier.'-'.$code_dossier_num;
//var_dump($_POST);
//print_r($financement);


//if( is_array($financement)){
//while (list ($key, $val) = each ($financement)) {
//echo "$val <br>";
//}}
//
//if($financement){
//	
//	foreach($financement as $key){
//		
//		print_r($key);
//		}
//	}
//	
	
	
	

$sql="SELECT * FROM tbl_dossier_prjt_marche WHERE Code_dossier_prjt_marche ='$ncode_dossier'";
//
//echo $sql;
$resultat=mysql_query("$sql");


$nombre = mysql_num_rows($resultat);

if($nombre == 0){
	$sql_insert="INSERT INTO tbl_dossier_prjt_marche(Code_dossier_prjt_marche, Code_origine_fk, Destination_fk, Objet_prjt_mrche, Attributaire_fk, Montant_projet_mrche, financement, Date_reception) VALUES('$ncode_dossier','$origine','$projet','$objet_dossier','$attributaire','$montant_finan_prjt_marche','$financement','$ndate_reception')";
$result=mysql_query("$sql_insert");


//$_SESSION['code_projet']=$code_projet;
//$_SESSION['source_financement']=$source_financement;
$sql_enr ="SELECT * FROM tbl_dossier_prjt_marche WHERE Code_dossier_prjt_marche ='$ncode_dossier'";


$resultat1=mysql_query("$sql_enr");
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
echo'</table>';

}else{
echo 'existe';

}
?>
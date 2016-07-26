<?php 
include('../config/connectmysql.php'); 
$code_projet=$_POST['projet'];
$annee=$_POST['annee'];
$nature=$_POST['nature'];
$source_finance=$_POST['source_finance'];
$montants=$_POST['montant_v'];
$sql="SELECT * FROM tbl_dotation_projet WHERE destination_fk ='$code_projet' AND nature_fk = '$nature' AND date_dotation = '$annee' AND code_source_fk ='$source_finance'";
//
//echo $sql;
$resultat=mysql_query("$sql");


$nombre = mysql_num_rows($resultat);

if($nombre == 0){
mysql_query("INSERT INTO tbl_dotation_projet(id_dotation, destination_fk, nature_fk, code_source_fk, date_dotation, montant_dotation) VALUES('','$code_projet','$nature','$source_finance','$annee','$montants')");


//$_SESSION['code_projet']=$code_projet;
//$_SESSION['source_financement']=$source_financement;
$sql_enr =" SELECT DP.id_dotation AS DOTATION, DP.destination_fk AS DESTINATION, DP.nature_fk AS NATURE, SFD.lib_sourceF AS SOURCE_FIN, DP.date_dotation AS DATE_DOTATION, DP.montant_dotation AS MONTANT_DOTATION
FROM tbl_dotation_projet DP, tbl_source_finance_dotation SFD
WHERE DP.code_source_fk= SFD.code_source_dotation
AND DP.destination_fk ='".$code_projet."'
AND DP.date_dotation='".$annee."'";


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
	echo '<tr><td>'.$donnee['DESTINATION'].'</td>';
	echo '<td>'.$donnee['NATURE'].'</td>';
	echo '<td>'.$donnee['SOURCE_FIN'].'</td>';
	echo '<td>'.$donnee['DATE_DOTATION'].'</td>';
	echo '<td>'.number_format($donnee['MONTANT_DOTATION'],0,","," ").'</td>';
echo '<td><input type="button" class="supprimer" id="'.$donnee['DOTATION'].'" value="Supprimer" "> </td></tr>';


}
echo'</table>';

}else{
echo 'existe';

}
?>
<?php 
include('../config/connectmysql.php'); 
$code_projet1=$_POST['code_projet'];
$annee1=$_POST['annee'];
$sql_enr =" SELECT DP.id_dotation AS DOTATION, DP.destination_fk AS DESTINATION, DP.nature_fk AS NATURE, SFD.lib_sourceF AS SOURCE_FIN, DP.date_dotation AS DATE_DOTATION, DP.montant_dotation AS MONTANT_DOTATION
FROM tbl_dotation_projet DP, tbl_source_finance_dotation SFD
WHERE DP.code_source_fk= SFD.code_source_dotation
AND DP.destination_fk ='".$code_projet1."'
AND DP.date_dotation='".$annee1."'";

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

?>
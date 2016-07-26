<?php 
include('../config/connectmysql.php'); 
$code_projet1=$_POST['code_projet'];
$annee1=$_POST['annee'];
$sql="SELECT * FROM tbl_dotation_projet WHERE destination_fk ='".$code_projet1."' AND date_dotation='".$annee1."'";
$resultat1=mysql_query("$sql");
echo '<table class="table table-striped table-condensed table-hover" >
<tr>
<td>DESTINATION</td>
<td>NATURE</td>
<td>ANNEE</td>
<td>MONTANT</td>
<td>OPTION</td>
</tr>';
while ($donnee = mysql_fetch_array($resultat1)){
	echo '<tr><td>'.$donnee['destination_fk'].'</td>';
	echo '<td>'.$donnee['nature_fk'].'</td>';
	echo '<td>'.$donnee['date_dotation'].'</td>';
	echo '<td>'.number_format($donnee['montant_dotation'],0,","," ").'</td>';
echo '<td><input type="button" class="supprimer" id="'.$donnee['id_dotation'].'" value="Supprimer" "> </td></tr>';

}
echo'</table>';

?>
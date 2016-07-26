<?php 
include('../config/connectmysql.php'); 
$projet=$_POST['projet'];
$sql="SELECT * FROM tbl_finprjt WHERE code_destination_fk='".$projet."'";
$resultat=mysql_query("$sql");

echo '<table class="table table-striped table-condensed table-hover" >
<tr>
<td>DESTINATION</td>
<td>SOURCE</td>
<td>MONTANT</td>
<td>OPTION</td>
</tr>';

if(mysql_num_rows($resultat)>0){
	while ($donnee = mysql_fetch_array($resultat)){
	echo '<tr>
	<td>'.$donnee['code_destination_fk'].'</td>';
	echo '<td>'.$donnee['code_finPrjt_fk'].'</td>';
	echo '<td>'.$donnee['montant_finPjt'].'</td>';
echo '<td><input type="button" class="supprimer" id="'.$donnee['code_FinPrjt'].'" value="Supprimer" "> </td></tr>';
	}
	}else{
	echo'<tr>
		<td colspan="4"> Pas d\'enregistrement	</td>
		</tr>';
		}
echo'</table>';
?>
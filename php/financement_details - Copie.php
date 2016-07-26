<?php 
include('../config/connectmysql.php'); 
if(isset($_POST['visualiser'])){

$visualiser_projet=$_POST['visualiser'];

}else{
	$visualiser_projet='neant';
	}

$resultat1=mysql_query("SELECT * FROM tbl_finprjt WHERE code_destination_fk ='".$_SESSION['code_projet']."' AND code_finPrjt_fk = '".$_SESSION['source_financement']."'");
echo '<table class="table table-striped table-condensed table-hover" >';
while ($donnee = mysql_fetch_array($resultat1)){
	echo '<tr><td>'.$donnee['code_FinPrjt'].'</td>';
	echo '<td>'.$donnee['code_destination_fk'].'</td>';
	echo '<td>'.$donnee['code_finPrjt_fk'].'</td>';
	echo '<td>'.$donnee['montant_finPjt'].'</td>';
	if($visualiser_projet != 'Visualiser'){
echo '<td><input type="button" class="supprimer" id="'.$donnee['code_FinPrjt'].'" value="Supprimer" "> </td>';
	}else{
echo '<td><p>NEANT</p> </td>';		
		}

echo'</tr>';

//echo '<td><input type="button" class="supprimer" id="'.$donnee['code_FinPrjt'].'" value="Supprimer" onclick="eliminerFinance('.$donnee['code_FinPrjt'].')"> </td></tr>';
}
echo'</table>';

?>
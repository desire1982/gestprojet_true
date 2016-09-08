<?php 
include('../config/connectmysql.php'); 
$code_projet=$_POST['projet'];
$source_finance=$_POST['source_finance'];
$nature=$_POST['nature'];
$montant_eng_situation=$_POST['montant_eng_situation'];
$date_edition_das=$_POST['date_edition_das'];
$date_production_situation=$_POST['date_production_situation'];
$date_enr_eng_situation_budget=$_POST['date_enr_eng_situation_budget'];
$utilisateur_connecte=$_POST['utilisateur_connecte'];
$ndate_edition_das=date('Y-m-d', strtotime($date_edition_das));
$ndate_production_situation=date('Y-m-d', strtotime($date_production_situation));
//var_dump($_POST);


$sql="SELECT * FROM tbl_situation_budgetaire WHERE destination_fk ='$code_projet' AND id_nature_fk= '$nature'  AND code_source_fk= '$source_finance' AND date_edite_DAS = '$ndate_edition_das' AND date_eng_pour_mois_de ='$ndate_production_situation'";
$resultat=mysql_query("$sql");

$nombre = mysql_num_rows($resultat);

if($nombre == 0){
mysql_query("INSERT INTO tbl_situation_budgetaire(id_situation_budget, destination_fk, id_nature_fk, code_source_fk, montant_eng_SB, date_edite_DAS, date_eng_pour_mois_de, date_saisie_eng_SB, eng_SB_saisi_par) VALUES('','$code_projet','$nature','$source_finance','$montant_eng_situation','$ndate_edition_das','$ndate_production_situation','$date_enr_eng_situation_budget','$utilisateur_connecte')");

$sql_enr ="SELECT `tbl_situation_budgetaire`.`id_situation_budget` AS ID_SITUATION_BUDGET,
 `tbl_situation_budgetaire`.`destination_fk` AS DESTINATION, 
 `tbl_situation_budgetaire`.`id_nature_fk` AS NATURE,
  `tbl_situation_budgetaire`.`code_source_fk` AS SOURCE_FINANCE,
 `tbl_situation_budgetaire`.`montant_eng_SB` AS MONTANT, 
 `tbl_situation_budgetaire`.`date_edite_DAS` AS EDITE_LE,
  `tbl_situation_budgetaire`.`date_eng_pour_mois_de` AS  DATE_DE_PRODUCTION
  FROM tbl_situation_budgetaire WHERE destination_fk ='".$code_projet."' AND id_nature_fk = '".$nature."' AND code_source_fk= '".$source_finance."' AND date_edite_DAS = '".$ndate_edition_das."' AND date_eng_pour_mois_de ='".$ndate_production_situation."'";


$resultat1=mysql_query("$sql_enr");

echo '<table class="table table-striped table-condensed table-hover" >
<tr>
<td>DESTINATION</td>
<td>SOURCE DE FINANCEMENT</td>
<td>NATURE</td>
<td>MONTANT</td>
<td>DATE D\'EDITION DAS</td>
<td>DATE DE PRODUCTION</td>
<td>OPTION</td>
</tr>';
while ($donnee = mysql_fetch_array($resultat1)){
	echo '<tr><td>'.$donnee['DESTINATION'].'</td>';
	echo '<td>'.$donnee['SOURCE_FINANCE'].'</td>';
	echo '<td>'.$donnee['NATURE'].'</td>';
	echo '<td>'.number_format($donnee['MONTANT'],0,","," ").'</td>';
	echo '<td>'.$donnee['EDITE_LE'].'</td>';
	echo '<td>'.$donnee['DATE_DE_PRODUCTION'].'</td>';
	
echo '<td><input type="button" class="supprimer" id="'.$donnee['ID_SITUATION_BUDGET'].'" value="Supprimer" "> </td></tr>';


}
echo'</table>';

}else{
echo 'existe';

}
?>
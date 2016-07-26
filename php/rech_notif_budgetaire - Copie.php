<?php 
include('../config/connectmysql.php'); 
$destination=$_POST['destination'];
$annee=$_POST['annee'];
var_dump($_POST);
$sql="SELECT 
  `tbl_dotation_projet`.`destination_fk` AS DESTINATION,
  `tbl_dotation_projet`.`nature_fk` AS NATURE,
  `tbl_nature`.`lib_nature` AS LIB_NATURE,
  `tbl_dotation_projet`.`montant_dotation` AS MONTANT_DOTATION,
  SUM(IFNULL(`tbl_modif_budget`.`montant_mb`, 0)) AS `MONTANT_MODIF`,
  `tbl_dotation_projet`.`montant_dotation` + SUM(IFNULL(`tbl_modif_budget`.`montant_mb`, 0)) AS `BUDGET_ACTUEL`,
  `tbl_dotation_projet`.`date_dotation` AS DATE_DOTATION,
  IFNULL(YEAR(`tbl_modif_budget`.`date_sign_mb`), `tbl_dotation_projet`.`date_dotation`) AS `ANNEE_DOTATION`
FROM
  `tbl_dotation_projet`
  LEFT OUTER JOIN `tbl_modif_budget` ON (`tbl_dotation_projet`.`destination_fk` = `tbl_modif_budget`.`destination_mb_fk`)
  AND (`tbl_dotation_projet`.`nature_fk` = `tbl_modif_budget`.`nature_mb_fk`)
  INNER JOIN `tbl_nature` ON (`tbl_dotation_projet`.`nature_fk` = `tbl_nature`.`id_nature`)
GROUP BY
  `tbl_dotation_projet`.`destination_fk`,
  `tbl_dotation_projet`.`nature_fk`,
  `tbl_nature`.`lib_nature`,
  `tbl_dotation_projet`.`montant_dotation`,
  `tbl_dotation_projet`.`date_dotation`,
  IFNULL(YEAR(`tbl_modif_budget`.`date_sign_mb`), `tbl_dotation_projet`.`date_dotation`)
HAVING
  DESTINATION='".$destination."' AND
  DATE_DOTATION ='".$annee."' AND 
  ANNEE_DOTATION ='".$annee."'";

$resultat=mysql_query("$sql");

echo '<table class="table table-striped table-condensed table-hover" >
<tr style="border: 1px solid blue;">
<td  style="border: 1px solid blue;">NATURE</td>
<td  style="border: 1px solid blue;">LIBELLE DE LA NATURE</td>
<td  style="border: 1px solid blue;">DOTATION INITIALE</td>
<td  style="border: 1px solid blue;">MODIFICATION BUDGETAIRE</td>
<td  style="border: 1px solid blue;">BUDGET ACTUEL</td>

</tr>';

if(mysql_num_rows($resultat)>0){
	$totalDotation=0;
	$totalMontantModif=0;
	$totalBudgetActuel=0;
	while ($donnee = mysql_fetch_array($resultat)){
		$totalDotation=$totalDotation+$donnee['MONTANT_DOTATION'];
		$totalMontantModif=$totalMontantModif+$donnee['MONTANT_MODIF'];
		$totalBudgetActuel=$totalBudgetActuel+$donnee['BUDGET_ACTUEL'];
	echo '<tr style="border: 1px solid blue;">
	<td  style="border: 1px solid blue;">'.$donnee['NATURE'].'</td>';
	echo '<td  style="border: 1px solid blue;">'.$donnee['LIB_NATURE'].'</td>';
	echo '<td style="text-align:center;border: 1px solid blue;">'.number_format($donnee['MONTANT_DOTATION'],0,","," ").'</td>';
	echo '<td style="text-align:center;border: 1px solid blue;">'.number_format($donnee['MONTANT_MODIF'],0,","," ").'</td>';
	echo '<td style="text-align:center;border: 1px solid blue;">'.number_format($donnee['BUDGET_ACTUEL'],0,","," ").'</td>';
echo '</tr>';
	}
	echo '<tr  style="border: 2px solid red;">
	<td colspan="2" style="text-align:left;font-weight:bold;">TOTAL DOTATION BUDGETAIRE</td>';
	echo '<td style="text-align:center;font-weight:bold;">'.number_format($totalDotation,0,","," ").'</td>';
	echo '<td style="text-align:center;font-weight: bold;">'.number_format($totalMontantModif,0,","," ").'</td>';
	echo '<td style="text-align:center;font-weight: bold;">'.number_format($totalBudgetActuel,0,","," ").'</td>';
echo '</tr>';
	
	}else{
	echo'<tr>
		<td colspan="5"> Pas d\'enregistrement	</td>
		</tr>';
		}
echo'</table>';
?>
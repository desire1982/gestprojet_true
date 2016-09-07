<?php 
include('../config/connectmysql.php'); 
$destination=$_POST['destination'];
$annee=$_POST['annee'];
//var_dump($_POST);

$sql="SELECT 
  `v_dotation_budget_modif`.`destination_fk` AS `DESTINATION`,
  `v_dotation_budget_modif`.`nature_fk` AS `NATURE` ,
  `tbl_nature`.`lib_nature` AS LIB_NATURE,
  `v_dotation_budget_modif`.`date_dotation` AS ANNEE_DOTATION,
  SUM(`v_dotation_budget_modif`.`BUDGET_ACTUEL`) AS BUDGET_DOTATION,
  SUM(CASE WHEN `v_dotation_budget_modif`.`code_source_fk` = 'TRE' THEN `v_dotation_budget_modif`.`BUDGET_ACTUEL` ELSE 0 END) AS `TRESOR`,
  SUM(CASE WHEN `v_dotation_budget_modif`.`code_source_fk` = 'DON' THEN `v_dotation_budget_modif`.`BUDGET_ACTUEL` ELSE 0 END) AS `DON`,
  SUM(CASE WHEN `v_dotation_budget_modif`.`code_source_fk` = 'EMP' THEN `v_dotation_budget_modif`.`BUDGET_ACTUEL` ELSE 0 END) AS `EMPRUNT`,
  SUM(`v_dotation_budget_modif`.`BUDGET_ACTUEL`) AS `Total`
FROM
  `v_dotation_budget_modif`
  INNER JOIN `tbl_nature` ON (`v_dotation_budget_modif`.`nature_fk` = `tbl_nature`.`id_nature`)
  INNER JOIN `tbl_source_finance_dotation` ON (`v_dotation_budget_modif`.`code_source_fk` = `tbl_source_finance_dotation`.`code_source_dotation`)
WHERE
  `v_dotation_budget_modif`.`destination_fk` ='".$destination."' AND 
  `v_dotation_budget_modif`.`date_dotation` ='".$annee."'
GROUP BY
  `v_dotation_budget_modif`.`destination_fk`,
  `v_dotation_budget_modif`.`nature_fk`,
  `tbl_nature`.`lib_nature`,
  `v_dotation_budget_modif`.`date_dotation`
ORDER BY
  `v_dotation_budget_modif`.`destination_fk`";


$resultat=mysql_query("$sql");


//Requete pour les entetes des tableaux à afficher	
	$sql_entete = "SELECT 
  `tbl_destination`.`destination` AS DESTINATIONS,
  `tbl_destination`.`lib_destination` AS LIB_DESTINATIONS
FROM
  `tbl_destination`
GROUP BY
  `tbl_destination`.`destination`,
  `tbl_destination`.`lib_destination`
HAVING
  `tbl_destination`.`destination` ='".$destination."'";
	$resultat_enete=mysql_query("$sql_entete");
	$donnee_destination= mysql_fetch_array($resultat_enete);
	
	
	
	
	

echo '<table class="table table-striped table-condensed table-hover" >
<tr style="border: 1px solid blue;">
<td colspan="6"  style="border: 1px solid blue; font-weight: bold; text-align:center;">'.$donnee_destination['DESTINATIONS'].' - '.$donnee_destination['LIB_DESTINATIONS'].'</td>

</tr>

<tr style="border: 1px solid blue;">
<td  style="border: 1px solid blue;">NATURE</td>
<td  style="border: 1px solid blue;">LIBELLE DE LA NATURE</td>
<td  style="border: 1px solid blue;">TRESOR</td>
<td  style="border: 1px solid blue;">DON</td>
<td  style="border: 1px solid blue;">EMPRUNT</td>
<td  style="border: 1px solid blue;">TOTAL</td>
</tr>';

if(mysql_num_rows($resultat)>0){
	
	$totalTRESOR=0;
	$totalDON=0;
	$totalEMPRUNT=0;
	$totalDOTATION=0;
	while ($donnee = mysql_fetch_array($resultat)){
		$totalTRESOR=$totalTRESOR+$donnee['TRESOR'];
		$totalDON=$totalDON+$donnee['DON'];
		$totalEMPRUNT=$totalEMPRUNT+$donnee['EMPRUNT'];
		$totalDOTATION=$totalDOTATION+$donnee['Total'];
	echo '<tr style="border: 1px solid blue;">
	<td  style="border: 1px solid blue;">'.$donnee['NATURE'].'</td>';
	echo '<td  style="border: 1px solid blue;">'.$donnee['LIB_NATURE'].'</td>';
	echo '<td style="text-align:center;border: 1px solid blue;">'.number_format($donnee['TRESOR'],0,","," ").'</td>';
	echo '<td style="text-align:center;border: 1px solid blue;">'.number_format($donnee['DON'],0,","," ").'</td>';
	echo '<td style="text-align:center;border: 1px solid blue;">'.number_format($donnee['EMPRUNT'],0,","," ").'</td>';
	echo '<td style="text-align:center;border: 1px solid blue;">'.number_format($donnee['Total'],0,","," ").'</td>';
echo '</tr>';
  $annee_affiche = $donnee['ANNEE_DOTATION'];
	}
	echo '<tr  style="border: 2px solid red;">
	<td colspan="2" style="text-align:left;font-weight:bold;">TOTAL DOTATION BUDGETAIRE '.$annee_affiche.'</td>';
	echo '<td style="text-align:center;font-weight:bold;">'.number_format($totalTRESOR,0,","," ").'</td>';
	echo '<td style="text-align:center;font-weight: bold;">'.number_format($totalDON,0,","," ").'</td>';
	echo '<td style="text-align:center;font-weight: bold;">'.number_format($totalEMPRUNT,0,","," ").'</td>';
	echo '<td style="text-align:center;font-weight: bold;">'.number_format($totalDOTATION,0,","," ").'</td>';
echo '</tr>';
	
	}else{
	echo'<tr>
		<td colspan="6"> Pas d\'enregistrement	</td>
		</tr>';
		}
echo'</table>';
?>
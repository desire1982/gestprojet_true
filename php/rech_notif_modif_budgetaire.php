<?php 
include('../config/connectmysql.php'); 
$destination=$_POST['destination'];
$annee=$_POST['annee'];
//var_dump($_POST);

$sql="SELECT 
  `tbl_dotation_projet`.`destination_fk` AS `DESTINATION`,
  `tbl_dotation_projet`.`nature_fk` AS `NATURE`,
  `tbl_nature`.`lib_nature` AS LIB_NATURE,
  `v_modif_budgetaire`.`nature_mb_fk`,
  `tbl_dotation_projet`.`date_dotation`,
  IFNULL(`v_modif_budgetaire`.`ANNEE_DOTATION`, `tbl_dotation_projet`.`date_dotation`) AS `ANNEE_DOTATION`,
  `tbl_dotation_projet`.`montant_dotation` AS MONTANT_DOTATION,
  SUM(IFNULL(`v_modif_budgetaire`.`montant_mb`, 0)) AS `MONTANT_MODIF`,
  `tbl_dotation_projet`.`montant_dotation` + SUM(IFNULL(`v_modif_budgetaire`.`montant_mb`, 0)) AS `BUDGET_ACTUEL`,
  `v_modif_budgetaire`.`destination_mb_fk`,
  `v_modif_budgetaire`.`type_actes`
  
FROM
  `tbl_dotation_projet`
  LEFT OUTER JOIN `v_modif_budgetaire` ON (`tbl_dotation_projet`.`destination_fk` = `v_modif_budgetaire`.`destination_mb_fk`)
  AND (`tbl_dotation_projet`.`date_dotation` = `v_modif_budgetaire`.`ANNEE_DOTATION`)
  AND (`tbl_dotation_projet`.`nature_fk` = `v_modif_budgetaire`.`nature_mb_fk`)
  INNER JOIN `tbl_nature` ON (`tbl_dotation_projet`.`nature_fk` = `tbl_nature`.`id_nature`)
GROUP BY
  `tbl_dotation_projet`.`destination_fk`,
  `tbl_dotation_projet`.`nature_fk`,
  `v_modif_budgetaire`.`nature_mb_fk`,
  `tbl_dotation_projet`.`date_dotation`,
  IFNULL(`v_modif_budgetaire`.`ANNEE_DOTATION`, `tbl_dotation_projet`.`date_dotation`),
  `tbl_dotation_projet`.`montant_dotation`,
  `v_modif_budgetaire`.`destination_mb_fk`,
  `v_modif_budgetaire`.`type_actes`,
  `tbl_nature`.`lib_nature`
HAVING
  DESTINATION='".$destination."' AND
  DATE_DOTATION ='".$annee."' AND 
  ANNEE_DOTATION ='".$annee."'";

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
<td colspan="5"  style="border: 1px solid blue; font-weight: bold; text-align:center;">'.$donnee_destination['DESTINATIONS'].' - '.$donnee_destination['LIB_DESTINATIONS'].'</td>

</tr>

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
  $annee_affiche = $donnee['ANNEE_DOTATION'];
	}
	echo '<tr  style="border: 2px solid red;">
	<td colspan="2" style="text-align:left;font-weight:bold;">TOTAL DOTATION BUDGETAIRE '.$annee_affiche.'</td>';
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
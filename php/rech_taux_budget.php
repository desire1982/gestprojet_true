<?php 
include('../config/connectmysql.php'); 
$destination=$_POST['destination'];
$annee=$_POST['annee'];
//var_dump($_POST);
//REQUETE DU TAUX D'EXECUTION PAR NATURE DE DEPENSE
$sql="SELECT 
  `v_dotation_budget_modif`.`destination_fk` AS destination,
  `tbl_destination`.`lib_destination` AS lib_destination,
  `v_dotation_budget_modif`.`nature_fk` AS nature,
  `tbl_nature`.`lib_nature`AS lib_nature,
  `v_dotation_budget_modif`.`code_source_fk`,
  `v_dotation_budget_modif`.`date_dotation`,
  `v_dotation_budget_modif`.`montant_dotation`,
  `v_dotation_budget_modif`.`BUDGET_ACTUEL` AS budget_actuel,
  `tbl_situation_budgetaire`.`destination_fk`,
  `tbl_situation_budgetaire`.`id_nature_fk`,
  `tbl_situation_budgetaire`.`code_source_fk`,
  IFNULL(SUM(`tbl_situation_budgetaire`.`montant_eng_SB`), 0) AS montant_eng_SB,
  IFNULL((`v_dotation_budget_modif`.`BUDGET_ACTUEL` - SUM(`tbl_situation_budgetaire`.`montant_eng_SB`)), 0) AS dispo_sur_eng,
  IFNULL(((SUM(`tbl_situation_budgetaire`.`montant_eng_SB`) / `v_dotation_budget_modif`.`BUDGET_ACTUEL`)) * 100, 0) AS taux_eng,
  `tbl_situation_budgetaire`.`date_eng_pour_mois_de`
FROM
  `v_dotation_budget_modif`
  LEFT OUTER JOIN `tbl_situation_budgetaire` ON (`v_dotation_budget_modif`.`destination_fk` = `tbl_situation_budgetaire`.`destination_fk`)
  AND (`v_dotation_budget_modif`.`nature_fk` = `tbl_situation_budgetaire`.`id_nature_fk`)
  AND (`v_dotation_budget_modif`.`code_source_fk` = `tbl_situation_budgetaire`.`code_source_fk`)
  INNER JOIN `tbl_destination` ON (`v_dotation_budget_modif`.`destination_fk` = `tbl_destination`.`destination`)
  INNER JOIN `tbl_nature` ON (`v_dotation_budget_modif`.`nature_fk` = `tbl_nature`.`id_nature`)
GROUP BY
  `v_dotation_budget_modif`.`destination_fk`,
  `tbl_destination`.`lib_destination`,
  `v_dotation_budget_modif`.`nature_fk`,
  `v_dotation_budget_modif`.`code_source_fk`,
  `v_dotation_budget_modif`.`date_dotation`,
  `v_dotation_budget_modif`.`montant_dotation`,
  `v_dotation_budget_modif`.`BUDGET_ACTUEL`,
  `tbl_situation_budgetaire`.`destination_fk`,
  `tbl_situation_budgetaire`.`id_nature_fk`,
  `tbl_situation_budgetaire`.`code_source_fk`,
  `tbl_nature`.`lib_nature`
HAVING
  `v_dotation_budget_modif`.`destination_fk` ='".$destination."' AND 
  `v_dotation_budget_modif`.`date_dotation` ='".$annee."'";


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
<td  style="border: 1px solid blue;">DESTINATION</td>
<td  style="border: 1px solid blue;">LIBELLE DE LA DESTINATION</td>
<td  style="border: 1px solid blue;">NATURE</td>
<td  style="border: 1px solid blue;">LIBELLE NATURE</td>
<td  style="border: 1px solid blue;">BUDGET ACTUEL</td>
<td  style="border: 1px solid blue;">ENGAGEMENT </td>
<td  style="border: 1px solid blue;">DISPONIBLE SUR ENGAGEMENT</td>
<td  style="border: 1px solid blue;">TAUX</td>

</tr>';

if(mysql_num_rows($resultat)>0){
	
	/*$totalTRESOR=0;
	$totalDON=0;
	$totalEMPRUNT=0;
	$totalDOTATION=0;*/
	while ($donnee = mysql_fetch_array($resultat)){
		/*$totalTRESOR=$totalTRESOR+$donnee['TRESOR'];
		$totalDON=$totalDON+$donnee['DON'];
		$totalEMPRUNT=$totalEMPRUNT+$donnee['EMPRUNT'];
		$totalDOTATION=$totalDOTATION+$donnee['Total'];*/
		
	echo '<tr style="border: 1px solid blue;">
	<td  style="border: 1px solid blue;">'.$donnee['destination'].'</td>';
	echo '<td  style="border: 1px solid blue;">'.$donnee['lib_destination'].'</td>';
	echo '<td  style="border: 1px solid blue;">'.$donnee['nature'].'</td>';
	echo '<td  style="border: 1px solid blue;">'.$donnee['lib_nature'].'</td>';
	echo '<td style="text-align:center;border: 1px solid blue;">'.number_format($donnee['budget_actuel'],0,","," ").'</td>';
	echo '<td style="text-align:center;border: 1px solid blue;">'.number_format($donnee['montant_eng_SB'],0,","," ").'</td>';
	echo '<td style="text-align:center;border: 1px solid blue;">'.number_format($donnee['dispo_sur_eng'],0,","," ").'</td>';
	echo '<td style="text-align:center;border: 1px solid blue;">'.number_format($donnee['taux_eng'],2).'</td>';
echo '</tr>';
 // $annee_affiche = $donnee['ANNEE_DOTATION'];
	}
	
	/*
	echo '<tr  style="border: 2px solid red;">
	<td colspan="2" style="text-align:left;font-weight:bold;">TOTAL DOTATION BUDGETAIRE '.$annee_affiche.'</td>';
	echo '<td style="text-align:center;font-weight:bold;">'.number_format($totalTRESOR,0,","," ").'</td>';
	echo '<td style="text-align:center;font-weight: bold;">'.number_format($totalDON,0,","," ").'</td>';
	echo '<td style="text-align:center;font-weight: bold;">'.number_format($totalEMPRUNT,0,","," ").'</td>';
	echo '<td style="text-align:center;font-weight: bold;">'.number_format($totalDOTATION,0,","," ").'</td>';
    echo '</tr>';*/
	
	}else{
	echo'<tr>
		<td colspan="8"> Pas d\'enregistrement	</td>
		</tr>';
		}
echo'</table>';
?>
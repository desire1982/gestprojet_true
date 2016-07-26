<?php 
include('../config/connectmysql.php'); 

$projet=$_POST['projet'];
$source=$_POST['source'];
$sql="SELECT 
  `tbl_finprjt`.`code_FinPrjt` AS CODE_FIN_PROJET,
  `tbl_finprjt`.`code_destination_fk` AS CODE_DESTINATION,
  `tbl_finprjt`.`code_finPrjt_fk` AS CODE_SOURCE_FINANCE,
  `tbl_sourcefinprjt`.`libFinPrjt` AS LIB_SOURCE_FINANCE,
  `tbl_finprjt`.`montant_finPjt` AS MONTANT_FINANCE
FROM
  `tbl_finprjt`
  INNER JOIN `tbl_sourcefinprjt` ON (`tbl_finprjt`.`code_finPrjt_fk` = `tbl_sourcefinprjt`.`codeFinPrjt`)
GROUP BY
  `tbl_finprjt`.`code_FinPrjt`,
  `tbl_finprjt`.`code_destination_fk`,
  `tbl_finprjt`.`code_finPrjt_fk`,
  `tbl_sourcefinprjt`.`libFinPrjt`,
  `tbl_finprjt`.`montant_finPjt`
HAVING CODE_DESTINATION ='".$projet."'";
$resultat1=mysql_query("$sql");

$totalProjet=0;
echo '<table class="table table-striped table-condensed table-hover" >
<tr style="border: 1px solid blue;">
<td style="border: 1px solid blue;">CODE</td>
<td style="border: 1px solid blue;">DESTINATION</td>
<td style="border: 1px solid blue;text-align:center;">SOURCE</td>
<td style="border: 1px solid blue;text-align:center;">MONTANT</td>
</tr>';
while ($donnee = mysql_fetch_array($resultat1)){
	$totalProjet=$totalProjet+$donnee['MONTANT_FINANCE'];
	echo '<tr style="border: 1px solid blue;"><td style="border: 1px solid blue;">'.$donnee['CODE_FIN_PROJET'].'</td>';
	echo '<td style="border: 1px solid blue;">'.$donnee['CODE_DESTINATION'].'</td>';
	echo '<td style="border: 1px solid blue;text-align:center;"">'.$donnee['LIB_SOURCE_FINANCE'].'</td>';
	echo '<td style="border: 1px solid blue;text-align:center;">'.number_format($donnee['MONTANT_FINANCE'],0,","," ").'</td>';
echo '</tr>';


//echo '<td><input type="button" class="supprimer" id="'.$donnee['code_FinPrjt'].'" value="Supprimer" onclick="eliminerFinance('.$donnee['code_FinPrjt'].')"> </td></tr>';
}

echo '<tr style="border: 1px solid blue;">
<td style="border: 1px solid blue;" colspan="2"> &nbsp;</td>
<td style="border: 1px solid blue;text-align:center;">TOTAL GENERAL</td>';
echo'<td style="border: 1px solid blue;text-align:center;">'.number_format($totalProjet,0,","," ").'</td>';
echo'</tr></table>';

?>
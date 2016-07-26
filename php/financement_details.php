<?php 
include('../config/connectmysql.php'); 

$resultat1=mysql_query("SELECT 
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
HAVING CODE_DESTINATION ='".$_SESSION['code_projet']."' AND CODE_SOURCE_FINANCE = '".$_SESSION['source_financement']."'");
echo '<table class="table table-striped table-condensed table-hover" >
<tr>
<td>CODE</td>
<td>DESTINATION</td>
<td>SOURCE</td>
<td>MONTANT</td>
<td>OPTION</td>
</tr>';
while ($donnee = mysql_fetch_array($resultat1)){
	echo '<tr><td>'.$donnee['CODE_FIN_PROJET'].'</td>';
	echo '<td>'.$donnee['CODE_DESTINATION'].'</td>';
	echo '<td>'.$donnee['LIB_SOURCE_FINANCE'].'</td>';
	echo '<td>'.$donnee['MONTANT_FINANCE'].'</td>';
echo '<td><input type="button" class="supprimer" id="'.$donnee['CODE_FIN_PROJET'].'" value="Supprimer" "> </td></tr>';

//echo '<td><input type="button" class="supprimer" id="'.$donnee['code_FinPrjt'].'" value="Supprimer" onclick="eliminerFinance('.$donnee['code_FinPrjt'].')"> </td></tr>';
}
echo'</table>';

?>
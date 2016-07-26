<?php 
include('../config/connectmysql.php'); 
$code_projet=$_POST['dest'];

//$code_projet='715';
//$source_financement='1';
//$montant_projet='2500';


$sql="SELECT 
  `tbl_finprjt`.`code_FinPrjt` AS `NUMERO`,
  `tbl_finprjt`.`code_destination_fk` AS `CODE_PROJET`,
  `tbl_destination`.`lib_destination` AS LIB_PROJET,
  `tbl_sourcefinprjt`.`libFinPrjt` AS `SOURCE_FINANCEMENT`,
  `tbl_finprjt`.`montant_finPjt` AS `MONTANT_FINANCEMENT`
  
FROM
  `tbl_finprjt`
  INNER JOIN `tbl_sourcefinprjt` ON (`tbl_finprjt`.`code_finPrjt_fk` = `tbl_sourcefinprjt`.`codeFinPrjt`)
  INNER JOIN `tbl_destination` ON (`tbl_finprjt`.`code_destination_fk` = `tbl_destination`.`destination`)
WHERE `tbl_finprjt`.`code_destination_fk` ='$code_projet'";


$sql_entete="SELECT 
  `tbl_finprjt`.`code_FinPrjt` AS `NUMERO`,
  `tbl_finprjt`.`code_destination_fk` AS `CODE_PROJET`,
  `tbl_destination`.`lib_destination` AS LIB_PROJET,
  `tbl_sourcefinprjt`.`libFinPrjt` AS `SOURCE_FINANCEMENT`,
  `tbl_finprjt`.`montant_finPjt` AS `MONTANT_FINANCEMENT`
  
FROM
  `tbl_finprjt`
  INNER JOIN `tbl_sourcefinprjt` ON (`tbl_finprjt`.`code_finPrjt_fk` = `tbl_sourcefinprjt`.`codeFinPrjt`)
  INNER JOIN `tbl_destination` ON (`tbl_finprjt`.`code_destination_fk` = `tbl_destination`.`destination`)
WHERE `tbl_finprjt`.`code_destination_fk` ='$code_projet'";

$resultat_entete = mysql_query("$sql_entete");
$donnee_entete = mysql_fetch_assoc($resultat_entete);


//
//echo $sql;
$resultat=mysql_query("$sql");
$nombre = mysql_num_rows($resultat);
$totalProjet=0;
if($nombre > 0){
echo '<table class="table table-striped table-condensed table-hover" >';

echo'<tr style="border: 1px solid blue;">
     <th style="border: 1px solid blue; width:25;" > # </th>
     <th style="border: 1px solid blue; width:100;"> DESTINATION </th>
     <th style="border: 1px solid blue; width:200; text-align:center;"> SOURCE DE FINANCEMENT</th>
	 <th style="border: 1px solid blue; width:150;"> MONTANT</th>
     </tr>';
while ($donnee = mysql_fetch_array($resultat)){
	$totalProjet=$totalProjet+$donnee['MONTANT_FINANCEMENT'];
	echo '<tr style="border: 1px solid blue;"><td style="border: 1px solid blue;">'.$donnee['NUMERO'].'</td>';
	echo '<td style="border: 1px solid blue;">'.$donnee['CODE_PROJET'].'</td>';
	echo '<td style="border: 1px solid blue;text-align:center;">'.$donnee['SOURCE_FINANCEMENT'].'</td>';
	echo '<td style="border: 1px solid blue;text-align:center;">'.number_format($donnee['MONTANT_FINANCEMENT'],0,","," ").'</td></tr>';
  $libelle = $donnee['LIB_PROJET'];
}
echo '<tr style="border: 1px solid blue;">
<td style="border: 1px solid blue;" colspan="2"> &nbsp;</td>
<td style="border: 1px solid blue;text-align:center;">TOTAL GENERAL</td>';
echo'<td style="border: 1px solid blue;text-align:center;">'.number_format($totalProjet,0,","," ").'</td>';
echo'</tr>';
echo'<tr><td colspan="4">'.$libelle.'</td></tr></table>';

}else{
	echo '<tr><td> PAS D\'ENREGISTREMENT</td></>';
	}

?>
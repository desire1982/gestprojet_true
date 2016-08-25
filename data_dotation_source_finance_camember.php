<?php
include 'config/connectmysql.php';
// Exécution de la requête
$result = mysql_query("SELECT 
  `tbl_dotation_projet`.`code_source_fk`,
  SUM(`tbl_dotation_projet`.`montant_dotation`) AS `montant_dotation`
FROM
  `tbl_dotation_projet`
WHERE
  `tbl_dotation_projet`.`date_dotation` = 2016
GROUP BY
  `tbl_dotation_projet`.`date_dotation`,
  `tbl_dotation_projet`.`code_source_fk`
ORDER BY
  `tbl_dotation_projet`.`date_dotation`,
  `tbl_dotation_projet`.`code_source_fk`");
//Creation d'un tableau
$rows = array();
while($r = mysql_fetch_array($result)) {
    $row[0] = $r[0];
    $row[1] = $r[1];
 // Empile un ou plusieurs éléments à la fin d'un tableau
    array_push($rows,$row);
	//echo '<pre>';
//	print_r($rows);
	//echo'</pre>';
}
// Retourne la représentation JSON d'une valeur
//print json_encode($rows, JSON_NUMERIC_CHECK);
print json_encode($rows, 32);

mysql_close($con);
?>
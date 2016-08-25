<?php
include 'config/connectmysql.php';
// Exécution de la requête

$query = mysql_query("SELECT 
`tbl_dotation_projet`.`date_dotation` AS date_dotation,
  SUM(CASE WHEN `tbl_dotation_projet`.`code_source_fk` = 'TRE' THEN `tbl_dotation_projet`.`montant_dotation` ELSE 0 END) AS `TRESOR`,
  SUM(CASE WHEN `tbl_dotation_projet`.`code_source_fk` = 'DON' THEN `tbl_dotation_projet`.`montant_dotation` ELSE 0 END) AS `DON`,
  SUM(CASE WHEN `tbl_dotation_projet`.`code_source_fk` = 'EMP' THEN `tbl_dotation_projet`.`montant_dotation` ELSE 0 END) AS `EMPRUNT`
FROM
  `tbl_dotation_projet`
GROUP BY
  `tbl_dotation_projet`.`date_dotation`
ORDER BY
  `tbl_dotation_projet`.`date_dotation` DESC");

$category = array();
$category['name'] = 'Date';

$series1 = array();
$series1['name'] = 'Tresor';

$series2 = array();
$series2['name'] = 'Don';

$series3 = array();
$series3['name'] = 'Emprunt';


while($r = mysql_fetch_array($query)) {
    $category['data'][] = $r['date_dotation'];
    $series1['data'][] = $r['TRESOR'];
    $series2['data'][] = $r['DON'];
    $series3['data'][] = $r['EMPRUNT'];   
}

$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);
array_push($result,$series3);


//print json_encode($result, JSON_NUMERIC_CHECK);
print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 
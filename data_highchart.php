<?php
include 'config/connectmysql.php';
// Exécution de la requête
$result = mysql_query("SELECT name, val FROM web_marketing");
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
print json_encode($rows, JSON_NUMERIC_CHECK);

mysql_close($con);
?>
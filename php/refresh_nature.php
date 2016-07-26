<?php
include('../config/connectmysql.php');
$query = "select * from tbl_nature";
$results = mysql_query($query);

$tabdata = array();

while ($row = mysql_fetch_assoc($results)) {
    $tabdata[] = $row;
    // print_r($tabdata);
}

echo json_encode($tabdata);


?>
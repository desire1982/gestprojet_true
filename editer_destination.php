<?php
include('/config/connect.php');
$id_destination=$_POST['id'];
//$id_destination='711220101';

$info = array();
$sql_affiche="SELECT * FROM tbl_destination  WHERE destination='".$id_destination."'";
//var_dump($sql_affiche);
$donnees=$mysqli->query("$sql_affiche"); 
while($row = $donnees->fetch_assoc()){
	$dests = $row['destination'];
	$lib_dests=$row['lib_destination'];
}
$info['dest']=$dests;
$info['lib_dest']=$lib_dests;

echo json_encode($info);
?>
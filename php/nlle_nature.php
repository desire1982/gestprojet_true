<?php
include('../config/connectmysql.php');
$nature=$_POST['nature'];
$libelle_nature=$_POST['lib_nature'];
//var_dump($_POST);


$sql="SELECT * FROM tbl_nature WHERE id_nature ='$nature'";

$resultat=mysql_query("$sql");

$nombre = mysql_num_rows($resultat);

if($nombre == 0){
    $sql_insert="INSERT INTO tbl_nature(id_nature, lib_nature) VALUES('$nature','$libelle_nature')";
    $resultat=mysql_query("$sql_insert");
	
	
	$sql_enr ="SELECT * FROM tbl_nature WHERE id_nature ='$nature'";
	
	$resultat1=mysql_query("$sql_enr");
	
	$tabdata = array();

while ($row = mysql_fetch_assoc($resultat1)) {
    $tabdata[] = $row;
   // print_r($tabdata);
}

echo json_encode($tabdata);
	
	}else{
    echo 'existe';
}
?>
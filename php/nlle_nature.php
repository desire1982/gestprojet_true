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
    mysql_query("$sql_insert");
   echo('bien');
}else{
    echo 'non enregistre';
}
?>
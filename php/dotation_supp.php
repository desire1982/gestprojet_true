<?php 
include('../config/connectmysql.php');
//print_r($_POST);
$id_dotation=$_POST['id_dotation'];
$sql="DELETE FROM tbl_dotation_projet WHERE id_dotation=".$id_dotation;
//echo $sql;
mysql_query("$sql");
?>
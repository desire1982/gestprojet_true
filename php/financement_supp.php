<?php 
include('../config/connectmysql.php');
//print_r($_POST);
$code_FinPrjt=$_POST['code_FinPrjt'];
$sql="DELETE FROM tbl_finprjt WHERE code_FinPrjt=".$code_FinPrjt;
mysql_query("$sql");
?>
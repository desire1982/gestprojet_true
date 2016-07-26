<?php 
include('../config/connectmysql.php'); 
$reference=$_POST['reference'];
$destinations=$_POST['destinations'];
$natures=$_POST['natures'];
$source_finance=$_POST['source_finance'];
$type_actes=$_POST['type_actes'];
$date_modif=$_POST['date_modif'];
$type_modif=$_POST['type_modif'];
$type_oper=$_POST['type_oper'];
$montant_modif=$_POST['montant_modif'];
$ndate_modif=date('Y-m-d', strtotime($date_modif));

$sql="SELECT * FROM tbl_modif_budget WHERE reference_modif ='$reference' AND destination_mb_fk = '$destinations' AND nature_mb_fk = '$natures'";

$resultat=mysql_query("$sql");

$nombre = mysql_num_rows($resultat);

if($nombre == 0){
mysql_query("INSERT INTO tbl_modif_budget(reference_modif, destination_mb_fk, nature_mb_fk, code_source_fk, type_actes, date_sign_mb, montant_mb) VALUES('$reference','$destinations','$natures','$source_finance','$type_actes','$ndate_modif','$montant_modif')");

echo'enregistrement bien effectué';

}else{
echo 'existe';

}
?>
<?php
include('../config/connectmysql.php'); 

$consulta= "SELECT * FROM tbl_dotation_projet limit 0, 10";
//	echo $consulta;
	$registro= mysql_query($consulta);

	//guardamos en un array multidimensional todos los datos de la consulta
	$i=0;
	$tabla= "";

	while($row= mysql_fetch_array($registro))
	{
	$tabla='{"id_dotation":"'.$row['id_dotation'].'","destination_fk":"'.$row['destination_fk'].'","nature_fk":"'.$row['nature_fk'].'","date_dotation":"'.$row['date_dotation'].'","montant_dotation":"'.$row['montant_dotation'].'"},';
	$i++;
	}
	$tabla= substr($tabla,0,strlen($tabla)- 1);
	
	echo '{"data":['.$tabla.']}';
?>
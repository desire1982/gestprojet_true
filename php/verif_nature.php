<?php
// This is a sample code in case you wish to check the username from a mysql db table
 include('../config/connectmysql.php'); 
//if(isset($_POST['id_nature'])) {
//$nature = $_POST['ntr'];

if(isset($_POST['ntr']))
{
	$nature=$_POST['ntr'];

	$checkdata=" SELECT * FROM tbl_nature WHERE id_nature='$nature' ";

	$query=mysql_query($checkdata);

	if(mysql_num_rows($query)>0)
	{
	echo '<font color="red">La nature de depense <strong>'.$nature.'</strong>'.
' existe.</font>';
	}
	else
	{
	echo "OK";
	}
exit();
}
?>
<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<?php
	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("gestprojet");
	
	for($i=1;$i<=$_POST["hdnLine"];$i++)
	{
		if($_POST["txtCustomerID$i"] != "")
		{
			$strSQL = "INSERT INTO customer ";
			$strSQL .="(CustomerID,Name,Email,CountryCode,Budget,Used) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$_POST["txtCustomerID$i"]."','".$_POST["txtName$i"]."', ";
			$strSQL .="'".$_POST["txtEmail$i"]."' ";
			$strSQL .=",'".$_POST["txtCountryCode$i"]."','".$_POST["txtBudget$i"]."', ";
			$strSQL .="'".$_POST["txtUsed$i"]."') ";
			$objQuery = mysql_query($strSQL);
		}
	}

	echo "Save Done.  Click <a href='phpMySQLListRecord.php'>here</a> to view.";

mysql_close($objConnect);
?>
</body>
</html>


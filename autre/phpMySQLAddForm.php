<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>
<body>
<form action="phpMySQLAddSave.php" name="frmAdd" method="post">
Select Line : 
<select name="menu1" onChange="MM_jumpMenu('parent',this,0)">
<?php
for($i=1;$i<=50;$i++)
{
	if($_GET["Line"] == $i)
	{
		$sel = "selected";
	}
	else
	{
		$sel = "";
	}
?>
	<option value="<?php echo $_SERVER["PHP_SELF"];?>?Line=<?php echo $i;?>" <?php echo $sel;?>><?php echo $i;?></option>
<?php
}
?>
</select>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">CustomerID </div></th>
    <th width="160"> <div align="center">Name </div></th>
    <th width="198"> <div align="center">Email </div></th>
    <th width="97"> <div align="center">CountryCode </div></th>
    <th width="70"> <div align="center">Budget </div></th>
    <th width="70"> <div align="center">Used </div></th>
  </tr>
  <?php
 if (isset($_GET["Line"])){
 
  $line = $_GET["Line"];
  
 }else{
	 $line=1; 
	 }
  if($line == 0){$line=1;}
  for($i=1;$i<=$line;$i++)
  {
  ?>
  <tr>
    <td><div align="center"><input type="text" name="txtCustomerID<?php echo $i;?>" size="5"></div></td>
    <td><input type="text" name="txtName<?php echo $i;?>" size="20"></td>
    <td><input type="text" name="txtEmail<?php echo $i;?>" size="20"></td>
    <td><div align="center"><input type="text" name="txtCountryCode<?php echo $i;?>" size="2"></div></td>
    <td align="right"><input type="text" name="txtBudget<?php echo $i;?>" size="5"></td>
    <td align="right"><input type="text" name="txtUsed<?php echo $i;?>" size="5"></td>
  </tr>
  <?php
  }
  ?>
  </table>
  <input type="submit" name="submit" value="submit">
  <input type="hidden" name="hdnLine" value="<?php echo $i;?>">
  </form>
</body>
</html>
<?php
// This is a sample code in case you wish to check the username from a mysql db table
 include('../config/connectmysql.php'); 
//if(isset($_POST['id_nature'])) {
$nature = $_POST['ntr'];

//$nature="2341";
/// echo $nature."2";
//$dbHost = 'db_host_here'; // usually localhost
//$dbUsername = 'db_username_here';
//$dbPassword = 'db_password_here';
//$dbDatabase = 'db_name_here';
 
//$db = mysql_connect($dbHost, $dbUsername, $dbPassword)
// or die ("Unable to connect to Database Server.");
//mysql_select_db ($dbDatabase, $db)
// or die ("Could not select database.");
 
$sql_check = mysql_query("SELECT * FROM tbl_nature where id_nature='".$nature."'")
 or die(mysql_error());
 
if(mysql_num_rows($sql_check)) {
    echo '<font color="red">The nickname <strong>'.$nature.'</strong>'.
' est déjà utilisé.</font>';
} else {
    echo 'OK';
}
//}
?>
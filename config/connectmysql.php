<?php 
//session_start(); 
// Désactiver l'affichage des erreurs sur une page
//ini_set("display_errors",0);error_reporting(0);
//$query = mysql_connect("mysql6.000webhost.com","a7516905_gestock","vade123456789");
//mysql_select_db("a7516905_gestock",$query);
//error_reporting(E_ALL ^ E_DEPRECATED);

// Désactiver l'affichage des erreurs sur une page
//ini_set("display_errors",0);error_reporting(0);

//On se connecte à localhost
$con = mysql_connect("localhost","daf_mie","123456789");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}
// on selectionne la base de donnée gestprojet_true
mysql_select_db("gestprojet_true",$con);
//error_reporting(E_ALL ^ E_DEPRECATED);

?>
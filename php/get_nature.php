<?php 
include('../config/connectmysql.php');
//var_dump($_POST);
if(!empty($_POST["source_id"])) {
	// Requete pour afficher toutes les natures qui ont été dotées pour une source de financement et une destination données
	$query ="SELECT 
  `tbl_dotation_projet`.`destination_fk` AS destination,
  `tbl_dotation_projet`.`code_source_fk`,
  `tbl_source_finance_dotation`.`lib_sourceF`,
  `tbl_dotation_projet`.`date_dotation`,
  `tbl_dotation_projet`.`nature_fk` AS nature,
  `tbl_nature`.`lib_nature` AS lib_nature
FROM
  `tbl_dotation_projet`
  INNER JOIN `tbl_source_finance_dotation` ON (`tbl_dotation_projet`.`code_source_fk` = `tbl_source_finance_dotation`.`code_source_dotation`)
  INNER JOIN `tbl_nature` ON (`tbl_dotation_projet`.`nature_fk` = `tbl_nature`.`id_nature`)
GROUP BY
  `tbl_dotation_projet`.`destination_fk`,
  `tbl_dotation_projet`.`code_source_fk`,
  `tbl_source_finance_dotation`.`lib_sourceF`,
  `tbl_dotation_projet`.`date_dotation`,
  `tbl_dotation_projet`.`nature_fk`,
  `tbl_nature`.`lib_nature`
HAVING
  `tbl_dotation_projet`.`code_source_fk` ='".$_POST["source_id"]."'
   AND `tbl_dotation_projet`.`destination_fk` ='".$_POST["destination_id"]."'
 ORDER BY
  `tbl_dotation_projet`.`code_source_fk`,
  `tbl_dotation_projet`.`nature_fk` 
  ";
  
  $result = mysql_query($query);
  while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		
		
		
		?>
	<option value=""> </option>
<?php
	foreach($resultset as $nature) {
?>
	<option value="<?php echo $nature["nature"]; ?>"><?php echo $nature["nature"].'-'.$nature["lib_nature"].'-'.$nature["destination"]; ?></option>
<?php
	
	}
}
?>
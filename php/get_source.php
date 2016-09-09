<?php 
include('../config/connectmysql.php');
if(!empty($_POST["destination_id"])) {
	// Requete pour afficher toutes les sources de financement qui ont été dotées pour une destination donnée
	$query ="SELECT 
  `tbl_dotation_projet`.`destination_fk` AS destination,
  `tbl_dotation_projet`.`code_source_fk` AS source_finance,
  `tbl_source_finance_dotation`.`lib_sourceF` AS lib_source_finance,
  `tbl_dotation_projet`.`date_dotation` AS date_finance
FROM
  `tbl_dotation_projet`
  INNER JOIN `tbl_source_finance_dotation` ON (`tbl_dotation_projet`.`code_source_fk` = `tbl_source_finance_dotation`.`code_source_dotation`)
GROUP BY
  `tbl_dotation_projet`.`destination_fk`,
  `tbl_dotation_projet`.`code_source_fk`,
  `tbl_dotation_projet`.`date_dotation`,
  `tbl_source_finance_dotation`.`lib_sourceF`
HAVING
  `tbl_dotation_projet`.`destination_fk` ='".$_POST["destination_id"]."'
  ORDER BY
  `tbl_dotation_projet`.`code_source_fk`
  ";
  
  $result = mysql_query($query);
  while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		
		
		
		?>
	<option value=""> </option>
<?php
	foreach($resultset as $sourcefinance) {
?>
	<option value="<?php echo $sourcefinance["source_finance"]; ?>"><?php echo $sourcefinance["lib_source_finance"].'-'.$sourcefinance["date_finance"]; ?></option>
<?php
	
	}
}
?>
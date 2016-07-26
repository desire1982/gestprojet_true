<?php
ob_start();
include('../config/connectmysql.php');
//include('../module/fpdf/fpdf.php');
require('../module/fpdf/rotation.php');


class PDF extends PDF_Rotate
{
function Header()
{
	//Affiche le filigrane
	$this->SetFont('Arial','B',25);
	$this->SetTextColor(203,203,203);
	$this->RotatedText(35,105,'FICHE NOTIFICATION DAF - MIE',30);
	$this->RotatedText(60,110,'MIE',30);
}

function RotatedText($x, $y, $txt, $angle)
{
	//Rotation du texte autour de son origine
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
}
}
//Conversion des caracteres spéciaux
define('accolade', chr(125) );
$Region=utf8_decode('Région');

$destination=$_GET['destination'];
$annee=$_GET['annee'];
$types=$_GET['types'];



$destination_Chapitre=substr($destination,0,3);
$destination_SChapitre=substr($destination,3,4);
$destination_Region=substr($destination,7,2);

//$destination_Region=iconv('UTF-8', 'ISO-8859-1', $destination_Region);

//print_r($_GET);


$pdf= new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(18,10,'',0);
$pdf->Cell(150,8,'NOTIFICATION DES CREDITS AUTORISES',0,'0','C');
$pdf->Ln();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(50);
$pdf->Cell(175,8,"MONTANT DES DOTATIONS INSCRITES AU BUDGET $annee",0,'0');
$pdf->Ln();
//$pdf->Ln(8);
$pdf->Image('../images/amoiriev1.jpg',155,5,30,30);
//$pdf->Ln(8);
$pdf->Ln();
$pdf->Cell(125);
$pdf->Cell(125,10,'Date du jour:'.date('d-m-Y'),0);
$pdf->Ln(8);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(18,5,'CHAPITRE :',0,'','C');
$pdf->Cell(18,5,$destination_Chapitre,0,'','C');
$pdf->Cell(18,5,accolade,0,'','C');
$pdf->Ln();
$pdf->Cell(18,2,'Sous Chapitre :',0,'','C');
$pdf->Cell(18,2,$destination_SChapitre,0,'','C');
//$pdf->SetDrawColor(0, 128, 0);
//$pdf->Line(10.0, 100.0, 120.0, 100.0);
//$pdf->SetLineWidth(1.0);
$pdf->Ln(2);
$pdf->Cell(18,5,$Region,0,'','C');
$pdf->Cell(18,5,$destination_Region,0,'','C');
$pdf->SetDrawColor(0, 128, 0);
$pdf->Line(15,59,190,59);
$pdf->SetLineWidth(1.0);

$pdf->Ln(5);


if($types =='notif_arete'){

//Entete
$pdf->SetFont('Arial','B',8);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.3);
$pdf->SetFillColor(200,220,255);
$pdf->Cell(2);
$pdf->Cell(10,5,'#',0,'','C','true');
$pdf->Cell(10,5,'NATURE :',0,'','C','true');
$pdf->Cell(50,5,'LIBELLE NATURE',0,'','C','true');
$pdf->Cell(35,5,'DOTATION INITIALE',0,'','C','true');
$pdf->Cell(40,5,'MODIFICATION BUDGETAIRE',0,'','C','true');
$pdf->Cell(35,5,'BUDGET ACTUEL',0,'','C','true');
$pdf->Ln(8);
//$pdf->SetDrawColor(255, 0, 0);
//$pdf->Rect(30.0, 30.0, 50.0, 30.0, 'D');

$pdf->SetFont('Arial','B',8);



$sql="SELECT 
  `tbl_dotation_projet`.`destination_fk` AS `DESTINATION`,
  `tbl_dotation_projet`.`nature_fk` AS `NATURE`,
  `tbl_nature`.`lib_nature` AS LIB_NATURE,
  `v_modif_budgetaire`.`nature_mb_fk`,
  `tbl_dotation_projet`.`date_dotation`,
  IFNULL(`v_modif_budgetaire`.`ANNEE_DOTATION`, `tbl_dotation_projet`.`date_dotation`) AS `ANNEE_DOTATION`,
  `tbl_dotation_projet`.`montant_dotation` AS MONTANT_DOTATION,
  SUM(IFNULL(`v_modif_budgetaire`.`montant_mb`, 0)) AS `MONTANT_MODIF`,
  `tbl_dotation_projet`.`montant_dotation` + SUM(IFNULL(`v_modif_budgetaire`.`montant_mb`, 0)) AS `BUDGET_ACTUEL`,
  `v_modif_budgetaire`.`destination_mb_fk`,
  `v_modif_budgetaire`.`type_actes`
  
FROM
  `tbl_dotation_projet`
  LEFT OUTER JOIN `v_modif_budgetaire` ON (`tbl_dotation_projet`.`destination_fk` = `v_modif_budgetaire`.`destination_mb_fk`)
  AND (`tbl_dotation_projet`.`date_dotation` = `v_modif_budgetaire`.`ANNEE_DOTATION`)
  AND (`tbl_dotation_projet`.`nature_fk` = `v_modif_budgetaire`.`nature_mb_fk`)
  INNER JOIN `tbl_nature` ON (`tbl_dotation_projet`.`nature_fk` = `tbl_nature`.`id_nature`)
GROUP BY
  `tbl_dotation_projet`.`destination_fk`,
  `tbl_dotation_projet`.`nature_fk`,
  `v_modif_budgetaire`.`nature_mb_fk`,
  `tbl_dotation_projet`.`date_dotation`,
  IFNULL(`v_modif_budgetaire`.`ANNEE_DOTATION`, `tbl_dotation_projet`.`date_dotation`),
  `tbl_dotation_projet`.`montant_dotation`,
  `v_modif_budgetaire`.`destination_mb_fk`,
  `v_modif_budgetaire`.`type_actes`,
  `tbl_nature`.`lib_nature`
HAVING
  DESTINATION='".$destination."' AND
  DATE_DOTATION ='".$annee."' AND 
  ANNEE_DOTATION ='".$annee."'";
  
$resultat=mysql_query("$sql");
  
  $item=0;
 $totalDotation=0;
 $totalMontantModif=0;
 $totalBudgetActuel=0;
while ($donnee = mysql_fetch_array($resultat)){
	$item=$item+1;
	$totalDotation= $totalDotation+$donnee['MONTANT_DOTATION'];
	$totalMontantModif=$totalMontantModif+$donnee['MONTANT_MODIF'];
	$totalBudgetActuel=$totalBudgetActuel+$donnee['BUDGET_ACTUEL'];
	$pdf->Cell(5);
	$pdf->Cell(10,5,$item,1,'','C');
	$pdf->Cell(10,5,$donnee['NATURE'],1,'','C');
	$pdf->Cell(50,5,$donnee['LIB_NATURE'],1,'','C');
	$pdf->Cell(35,5,number_format($donnee['MONTANT_DOTATION'],0,","," "),1,'','C');
	$pdf->Cell(40,5,number_format($donnee['MONTANT_MODIF'],0,","," "),1,'','C');
	$pdf->Cell(35,5,number_format($donnee['BUDGET_ACTUEL'],0,","," "),1,'','C'); 
	$pdf->Ln(5);
	}
	$pdf->Ln(2);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(10,5,'',0,'','L');
	$pdf->Cell(50,5,'TOTAL DOTATION BUDGETAIRE',1,'','C');
	$pdf->Cell(15);
	$pdf->Cell(35,5,number_format($totalDotation,0,","," "),1,'','C');
	//$pdf->Cell(10);
	$pdf->Cell(40,5,number_format($totalMontantModif,0,","," "),1,'','C');
	//$pdf->Cell(10);	
	$pdf->Cell(35,5,number_format($totalBudgetActuel,0,","," "),1,'','C');	
}else{
	   
	   
	   //Entete
$pdf->SetFont('Arial','B',8);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.3);
$pdf->SetFillColor(200,220,255);
$pdf->Cell(2);
//$pdf->Cell(10,5,'#',0,'','C','true');
$pdf->Cell(10,5,'NATURE :',0,'','C','true');
$pdf->Cell(50,5,'LIBELLE NATURE',0,'','C','true');
$pdf->Cell(30,5,'TRESOR',0,'','C','true');
$pdf->Cell(30,5,'DON',0,'','C','true');
$pdf->Cell(30,5,'EMPRUNT',0,'','C','true');
$pdf->Cell(30,5,'TOTAL',0,'','C','true');
$pdf->Ln(8);
//$pdf->SetDrawColor(255, 0, 0);
//$pdf->Rect(30.0, 30.0, 50.0, 30.0, 'D');

$pdf->SetFont('Arial','B',8);
	
	$sql="SELECT 
  `v_dotation_budget_modif`.`destination_fk` AS `DESTINATION`,
  `v_dotation_budget_modif`.`nature_fk` AS `NATURE` ,
  `tbl_nature`.`lib_nature` AS LIB_NATURE,
  `v_dotation_budget_modif`.`date_dotation` AS ANNEE_DOTATION,
  SUM(`v_dotation_budget_modif`.`BUDGET_ACTUEL`) AS BUDGET_DOTATION,
  SUM(CASE WHEN `v_dotation_budget_modif`.`code_source_fk` = 'TRE' THEN `v_dotation_budget_modif`.`BUDGET_ACTUEL` ELSE 0 END) AS `TRESOR`,
  SUM(CASE WHEN `v_dotation_budget_modif`.`code_source_fk` = 'DON' THEN `v_dotation_budget_modif`.`BUDGET_ACTUEL` ELSE 0 END) AS `DON`,
  SUM(CASE WHEN `v_dotation_budget_modif`.`code_source_fk` = 'EMP' THEN `v_dotation_budget_modif`.`BUDGET_ACTUEL` ELSE 0 END) AS `EMPRUNT`,
  SUM(`v_dotation_budget_modif`.`BUDGET_ACTUEL`) AS `Total`
FROM
  `v_dotation_budget_modif`
  INNER JOIN `tbl_nature` ON (`v_dotation_budget_modif`.`nature_fk` = `tbl_nature`.`id_nature`)
  INNER JOIN `tbl_source_finance_dotation` ON (`v_dotation_budget_modif`.`code_source_fk` = `tbl_source_finance_dotation`.`code_source_dotation`)
WHERE
  `v_dotation_budget_modif`.`destination_fk` ='".$destination."' AND 
  `v_dotation_budget_modif`.`date_dotation` ='".$annee."'
GROUP BY
  `v_dotation_budget_modif`.`destination_fk`,
  `v_dotation_budget_modif`.`nature_fk`,
  `tbl_nature`.`lib_nature`,
  `v_dotation_budget_modif`.`date_dotation`
ORDER BY
  `v_dotation_budget_modif`.`destination_fk`";
  
$resultat=mysql_query("$sql");
  
  $item=0;
  $totalTRESOR=0;
	$totalDON=0;
	$totalEMPRUNT=0;
	$totalDOTATION=0;
while ($donnee = mysql_fetch_array($resultat)){
	$item=$item+1;
	$totalTRESOR=$totalTRESOR+$donnee['TRESOR'];
		$totalDON=$totalDON+$donnee['DON'];
		$totalEMPRUNT=$totalEMPRUNT+$donnee['EMPRUNT'];
		$totalDOTATION=$totalDOTATION+$donnee['Total'];
	$pdf->Cell(2);
	//$pdf->Cell(10,5,$item,1,'','C');
	$pdf->Cell(10,5,$donnee['NATURE'],1,'','C');
	$pdf->Cell(50,5,$donnee['LIB_NATURE'],1,'','C');
	$pdf->Cell(30,5,number_format($donnee['TRESOR'],0,","," "),1,'','C');
	$pdf->Cell(30,5,number_format($donnee['DON'],0,","," "),1,'','C');
	$pdf->Cell(30,5,number_format($donnee['EMPRUNT'],0,","," "),1,'','C'); 
	$pdf->Cell(30,5,number_format($donnee['Total'],0,","," "),1,'','C');
	$pdf->Ln(5);
	}
	$pdf->Ln(2);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(5,5,'',0,'','L');
	$pdf->Cell(50,5,'TOTAL DOTATION BUDGETAIRE',1,'','C');
	$pdf->Cell(7);
	$pdf->Cell(30,5,number_format($totalTRESOR,0,","," "),1,'','C');
	//$pdf->Cell(10);
	$pdf->Cell(30,5,number_format($totalDON,0,","," "),1,'','C');
	//$pdf->Cell(10);	
	$pdf->Cell(30,5,number_format($totalEMPRUNT,0,","," "),1,'','C');
	$pdf->Cell(30,5,number_format($totalDOTATION,0,","," "),1,'','C');
	
	}

$pdf->Output('report.pdf','I');

ob_end_flush();
?>
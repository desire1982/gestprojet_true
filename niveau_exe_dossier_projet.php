

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GESTPROJET V1</title>

    <!-- Bootstrap Core CSS -->
    <link  href="module/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="menu/css/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="menu/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
 <?php 
	  include('/menu/menu.php'); 
	   ?>

 <div id="page-wrapper">
                         
            <div class="row">
                <div class="col-lg-10">
 
 <table width="200" border="1">
  <tr>
      <td><button disabled  id="nouveau_financement"  class="btn btn-primary">FINANCEMENT</button></td>
  </tr>
</table>

                
  <?php 
include('/config/connectmysql.php'); 
   $sql_affiche="SELECT `tbl_dossier_prjt_marche`.`Code_dossier_prjt_marche` AS CODE_DOSSIER,
   `tbl_dossier_prjt_marche`.`Code_origine_fk` AS ORIGINE, `tbl_destination`.`lib_destination` AS PROJET,
  `tbl_dossier_prjt_marche`.`Objet_prjt_mrche` AS OBJET_MARCHE, `tbl_dossier_prjt_marche`.`Attributaire_fk` AS ATTRIBUTAIRE,
  `tbl_dossier_prjt_marche`.`Montant_projet_mrche` AS MONTANT_MARCHE, `tbl_dossier_prjt_marche`.`financement` AS TYPE_FINANCEMENT,
  `tbl_dossier_prjt_marche`.`Date_reception` AS DATE_RECEPTION_DOSSIER, `tbl_dossier_prjt_marche`.`Etat_dossier` AS ETAT_DOSSIER
FROM `tbl_destination`
  INNER JOIN `tbl_dossier_prjt_marche` ON (`tbl_destination`.`destination` = `tbl_dossier_prjt_marche`.`Destination_fk`)";
  ?>              
                
      <div id="affiche_destination" >  
	 <table class="table table-striped table-condensed table-hover">
     <tr>
     <th width="10"> # </th>
     <th width="200"> CODE DOSSIER </th>
     <th width="100"> ORIGINE </th>
     <th width="100"> PROJET </th>
     <th width="300"> OBJET DU MARCHE </th>
     <th width="100"> ATTRIBUTAIRE </th>
     <th width="50"> MONTANT </th>
      <th width="100" colspan="2" style="text-align:center"> OPTION </th>
     </tr>
     
     <?php
	  $sql=mysql_query("$sql_affiche");
	  $item=0; 
	 if(mysql_num_rows($sql)>0){
		 while($donnee = mysql_fetch_array($sql)){ 
		// $nbreProjet=mysql_num_rows(mysql_query("SELECT * FROM tbl_finprjt WHERE code_destination_fk='".$donnee['destination']."'"));
		 $item=$item + 1;   
	   ?> 
 <tr> 
 <td><?php echo $item; ?> </td>     
<td><?php echo $donnee['CODE_DOSSIER']; ?> </td>
<td><?php echo $donnee['ORIGINE']; ?></td>
<td><?php echo $donnee['PROJET']; ?></td>
<td><?php echo $donnee['OBJET_MARCHE']; ?></td>
<td><?php echo $donnee['ATTRIBUTAIRE']; ?></td>
<td><span class="badge"><?php echo number_format($donnee['MONTANT_MARCHE'],0,","," "); ?></span></td>
<td><input type="button" class="btn btn-success" value="NIVEAU EXECUTION" onclick="NiveauExecution('<?php echo $donnee['CODE_DOSSIER']; ?>')"></td>
<td><input type="button" class="btn btn-success" value="DETAIL" onclick="afficheDetailDossier('<?php echo $donnee['CODE_DOSSIER']; ?>')"></td> 
</tr>

   <?php 
	   } }else{
	   ?>
     <tr> 
 <td colspan="5"> Pas d'enregistrement </td>   </tr> 
  <?php 
	   } 
	   ?>
 
</table>
</div>

                  
                
          
        </div>
        <!-- /.col-lg-8 -->
                   
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <!--MODAL PARA EL REGISTRO DE PRODUCTOS-->

<!-- Modal De Registro -->
<div class="modal fade" id="module_financement" tabindex="-1" role="dialog" aria-labelled by="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
</div>
<div class="modal-body">
<fieldset> <legend> 1.Choisir le projet </legend>
<table class="tbl-registro" width="100%">

<tr>
<td> Destination:</td>
<td>
<?php 
//--------requete du menu destination
$requete1="SELECT *  FROM tbl_destination";
$resultat1=mysql_query($requete1);
?>
<label> </label>
 <div class="input-group"><span class="input-group-addon" id="basic-addon1">Destination:</span><select name="destinationID" id="destinationID" class="form-control">
 <?php while($destinations= mysql_fetch_array($resultat1)){ ?>
 <option value="<?php echo $destinations['destination']; ?> ">
 <?php echo $destinations['lib_destination']; ?> </option>
 
 <?php } ?>
 
 </select></div> 
</td>
</tr>
<p></p>

<tr>
<td>SOURCE DE FINANCEMENT</td>
<td> 
<?php 
//--------requete du menu SOURCE DE FINANCEMENT
$requete2="SELECT *  FROM tbl_sourcefinprjt";
$resultat2=mysql_query($requete2);
?>
<label> </label>
 <select name="sourceFinance" id="sourceFinance" class="form-control">
 <?php while($sourceFinances= mysql_fetch_array($resultat2)){ ?>
 <option value="<?php echo $sourceFinances['codeFinPrjt']; ?> ">
 <?php echo $sourceFinances['libFinPrjt']; ?> </option>
 
 <?php } ?>
 
 </select> 
 </td> 
</tr>
<tr>
<td colspan="4"> <input type="button" id="ajouterProjet" class="btn btn-success" value="Ajouter"/> <input type="button" id="nouveauProjet" class="btn btn-success" value="Nouveau"/><input type="button" id="visualiserProjet" class="btn btn-success" value="Visualiser"/><input type="button" id="RechercheProjet" class="btn btn-success" value="Recherche"/>
<input type="hidden" placeholder="" class="form-control"
id="RechProjet" disabled="disabled"/>
</td> </tr> </table> 
</fieldset>
	<div id="mensaje"> </div>
    <div id="AjoutSourceFinance">
<fieldset id="Source_finance_affiche"> 
<legend> 2.SOURCE DE FINANCEMENT </legend>

<table  width="100%">
<tr>
<td> <div class="row"> 
<div class="col-lg-4"><label> Destination </label>
<input type="text" placeholder=" " class="form-control"
id="enrPrjt" disabled="disabled"/>
 </div> 
<div class="col-lg-4">

<?php 
//--------requete du menu SOURCE DE FINANCEMENT
$requete3="SELECT *  FROM tbl_sourcefinprjt";
$resultat3=mysql_query($requete3);
?>
<label> Source </label>
<select name="enrSource" id="enrSource" class="form-control">
 <?php while($sourceFinances= mysql_fetch_array($resultat3)){ ?>
 <option value="<?php echo $sourceFinances['codeFinPrjt']; ?> ">
 <?php echo $sourceFinances['libFinPrjt']; ?> </option>
 
 <?php } ?>
 
 </select> 
<!--<input type="text" placeholder=" " class="form-control"
id="enrSource" disabled="disabled"/>-->

</div>
<div class="col-lg-4"><label> Montant </label>
<input type="text" placeholder="" class="form-control"
id="enrMontant" disabled="disabled"/>
</div>
</div>
</td>
<td> <label> </label>
 <input type="button" id="enrFinance" class="btn btn-primary" value="+" disabled="disabled"/>
</td> </tr> </table> 

</fieldset>
</div>
<br/>

<div id="contenidoRegistro">
</div>

 
<div class="modal-footer">
<input type="button" id="retour" class="btn btn-default" value="RETOUR"/>
</div>
</div>
</div>
</div>
</div>




<!--MODAL PARA DE NIVEAU D'EXECUTION -->
<div class="modal fade" id="niveauExecution" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
	   <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
	   <h4 class="modal-title" id="myModalLabel"> <b> FICHE DE NIVEAU D'EXECUTION </b> </h4>
	  </div>
	  <div class="modal-body" >
      <!-- <div class="modal-body" id="resultSourceFinancement">-->
     
    
    <input type="text" class="form-control" id="code_dossier" name="code_dossier" placeholder="" disabled>
    <p></p>
   <div class="input-group"><span class="input-group-addon" id="basic-addon1">Etat du dossier:</span>   
      <select name="Etat_dossier" id="Etat_dossier" class="form-control">
    <option value="Recu">Réçu </option>
    <option value="Transmis">Transmis </option>
    <option value="Retourne">Retourné </option>
    <option value="Numerote">Numeroté </option>
    <option value="Signe">Signé </option>
    <option value="Signe_numerote">Signé et numeroté </option>
    </select>
      
   </div> 
   <p></p> 
      <?php 
//--------requete du menu SOURCE DE FINANCEMENT
$requete_str="SELECT *  FROM tbl_structure";
$resultat_str=mysql_query($requete_str);
?>
<div class="input-group"><span class="input-group-addon" id="basic-addon1">Structure:</span>
 <select name="sourceStructure" id="sourceStructure" class="form-control">
 <?php while($Structures= mysql_fetch_array($resultat_str)){ ?>
 <option value="<?php echo $Structures['Code_structure']; ?> ">
 <?php echo $Structures['Lib_structure']; ?> </option>
 
 <?php } ?>
 
 </select> 
   </div> 
   <p></p>  
   
   <div class="input-group"> 
 <div class="input-group-addon">Date :</div>
    <input type="date" class="form-control" id="date_dossier" name="date_dossier" placeholder="">
   </div>
  <P></P>  
    
     <p></p>
    <div class="input-group"> 
 <div class="input-group-addon">Motif :</div>
    <input  type="text" class="form-control" id="observation" name="observation" placeholder=""> 
     </div>
  <P></P>
      
      
	  </div>
      <div class="modal-footer">
<input type="button" id="validerNiveau" class="btn btn-success" value="VALIDER"/> <input type="button" id="retour" class="btn btn-success" value="RETOUR"/>
</div>
	 </div>
	</div>
 </div>


<!--MODAL PARA DE DETAIL DOSSIER -->
<div class="modal fade" id="DetailDossier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
	   <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
	   <h4 class="modal-title" id="myModalLabel"> <b> FICHE DE DETAILS DE NIVEAU D'EXECUTION </b> </h4>
	  </div>
	  <div class="modal-body" id="resultDossier">
	  </div>
      <div class="modal-footer">
<input type="button" id="retour" class="btn btn-default" value="RETOUR"/>
</div>
	 </div>
	</div>
 </div>


    <!-- jQuery -->
    <script src="module/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="module/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="menu/js/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="menu/js/sb-admin-2.js"></script>
    
    
 <script type="text/javascript">   
    $(function(){
	
	
	$(document).on("click", ".supprimer", function(){
		var code_FinPrjt= $(this).attr("id");
	//	var visualiser ='neant';
	// console.log(code_FinPrjt+visualiser);
		
		//var financeid= $(this).val();
		console.log(code_FinPrjt);
		var confirmation = confirm('Voulez vous supprimer cet enregistrement ?')
		if(confirmation==true){
		$.ajax({
		
		type:'POST',
		data:'code_FinPrjt='+code_FinPrjt,
		url:'php/financement_supp.php',
		success: function(resultat){
			console.log('La suppression bien deroul');
			$( "#contenidoRegistro" ).load( "php/financement_details.php" );
			
		}
		
		
	});
	
		}else{
		return false;	
			
			}
	});
	
	
	
	
	
	//BOUTON SUR CLIQUE DU NOUVEAU FINANCEMENT
	
	$('#nouveau_financement').on('click', function(){
	//$('#destinationID').removeAttr('disabled');	
	$( "#AjoutSourceFinance" ).hide(500);
	$('#module_financement').modal({
	show:true,
	backdrop:'static'
	
	})
		
		
	});
	
//BOUTON AJOUTER DE LA FENETRE MODALE	
$('#ajouterProjet').on('click', function(){

var destination = $('#destinationID').val();
var sourcefinancement = $('#sourceFinance').val();	
//$_SESSION['dest']= sourcefinancement;

alert( destination + ' ' + sourcefinancement );

$('#enrPrjt').val(destination).focus();

//$('#enrPrjt').removeAttr('disabled').focus();
//$('#enrSource').val(sourcefinancement);
$('#enrMontant').removeAttr('disabled');
$('#enrFinance').removeAttr('disabled');
//$('#destinationID').attr('disabled','disabled');
$('#sourceFinance').removeAttr('disabled');
$( "#Source_finance_affiche" ).show(); // Montrer le formulaire de saisie des finances
$( "#AjoutSourceFinance" ).show();
$( "#contenidoRegistro" ).hide(); // Cacher le contenu de visualiser

})

//BOUTON + DU SOUS FORMULAIRE DE LA MODALE
$('#enrFinance').on('click', function(){
	
	var projet = $('#enrPrjt').val();
	var source = $('#enrSource').val();
	var montant = $('#enrMontant').val();
	
	if(montant.length>0){
		//alert(projet+source+montant);
	$.ajax({
		
		type:'POST',
		data:'projet='+projet+'&source='+source+'&montant='+montant,
		url:'php/financement_enr.php',
		success: function(data){
			if(data == 'existe'){
		$('#mensaje').html('<p class="alert alert-warning"> les informations existent dans la base </p>');	
		$('#enrMontant').focus();
		alert('Cette source de financement a déjà un montant');
	
			}else{
		$('#enrMontant').val();	
		$('#enrMontant').focus();
		$('#mensaje').hide();
		$('#contenidoRegistro').show(); // Montrer le contenu de visualiser
		$('#contenidoRegistro').html(data).show();
		alert('l\'enregistrement s\' est bien passé');
		//$('#mensaje').html('<p class="alert alert-warning"> le montant doit est exate </p>');
			}  
			
		}
		
	});
	
	}else{
		
	$('#mensaje').html('<p class="alert alert-warning"> le montant doit etre positif </p>');
	
		}
	
})



//BOUTON VISUALISER DU FORMULAIRE DE LA MODALE
$('#visualiserProjet').on('click', function(){

    var projet = $('#destinationID').val();
	var source = $('#sourceFinance').val();
	//var visualiser = $('#visualiserProjet').val();
	
	//var montant = $('#enrMontant').val();
   console.log(projet+source);
   
   	$.ajax({
		
		type:'POST',
		data:'projet='+projet+'&source='+source,
		url:'php/financement_visu.php',
		success: function(resultat){
			console.log('La VISUALISATION bien deroul');
			$('.AjoutSourceFinance').hide();
			$('#Source_finance_affiche').hide(); // Cacher le formulaire de saisie des finances
			$('#contenidoRegistro').show(); // Montrer le contenu de visualiser
			$('#contenidoRegistro').html(resultat); // Afficher le contenu de visualisation
			
		
		}
		
	});

});

//FIN DU BOUTON VISUALISER


//BOUTON RECHERCHER
$('#destinationID').on('change', function(){
    var projet = $('#destinationID').val();
$('#RechProjet').val($('#destinationID').val());
//var projet1 = document.getElementById("destinationID").value
//console.log(projet1);

});



$('#RechercheProjet').on('click', function(){

    var projet = $('#RechProjet').val();
	//var source = $('#sourceFinance').val();
	//var visualiser = $('#visualiserProjet').val();
	
	//var montant = $('#enrMontant').val();
   console.log(projet);
   
   	$.ajax({
		
		type:'POST',
		data:'projet='+projet,
		url:'php/financement_rech.php',
		success: function(resultat){
			console.log('La RECHERCHE bien deroul');
			$( "#contenidoRegistro" ).html(resultat);
			$( ".AjoutSourceFinance" ).hide(); // Cacher le formulaire de saisie des finances
		
		}
		
	});
return false;
});


})
// fin de jquery













// DEBUT DU SCRIPT
 <!------------------------------------------------------------- DEBUT DU SCRIPT -------------------------------------------------->


// FONCTION NIVEAU D'EXECUTION DES DOSSIERS

 function NiveauExecution(codeDossier){
	 alert(codeDossier);
	 //Insertion du code dossier dans le champ code dossier de la fenetre modale
	  document.getElementById('code_dossier').value=codeDossier;
	 document.getElementById('Etat_dossier').value="";
	document.getElementById('sourceStructure').value="";
	document.getElementById('date_dossier').value="";
	document.getElementById('observation').value="";
	//  $('#niveauExecution')[0].reset();
	  
			 $('#niveauExecution').modal({
				 show:true,
				 backdrop:'static',
				 
		 });
 }


// BOUTON RETOUR
	$('#retour').on('click', function(){
	location.href=document.URL;	
		})
    
	
	$('#validerNiveau').on('click', function(){
		
		var code_dossier = document.getElementById('code_dossier').value;
		var Etat_dossier = document.getElementById('Etat_dossier').value;
		var sourceStructure = document.getElementById('sourceStructure').value;
		var date_dossier = document.getElementById('date_dossier').value;
		var observation = document.getElementById('observation').value;
		alert(code_dossier+Etat_dossier+sourceStructure+date_dossier+observation)
		
		if (Etat_dossier == null || Etat_dossier == "") {
        alert("L'etat du dossier est vide");
		document.getElementById('Etat_dossier').focus();
        return false;
    }else if(sourceStructure== null || sourceStructure == ""){
		alert("La structure est vide");
		document.getElementById('sourceStructure').focus();
        return false;
		}else if(date_dossier== null || date_dossier == ""){
		alert("La date est vide");
		document.getElementById('date_dossier').focus();
        return false;
		
		}else{
			//On insère le code ajax
			
			$.ajax({
			type:'POST',
			url:"php/dossier_niveau_exe.php",
			data:'code_dossier='+code_dossier+'&Etat_dossier='+Etat_dossier+'&sourceStructure='+sourceStructure+'&date_dossier='+date_dossier+'&observation='+observation,
			success: function(data){
				 if(data == 'existe'){
					
					 alert('Niveau existe déja');
					// return false;
					 }else{
					 alert('Le niveau bien enregistrer'); 
					// return false;
								
				//	 $('#module_financement').modal({
				// show:true,
				// backdrop:'static',
				 
		// });
						 
						 }
				
				}
				
				
				})//ajax
			
			}// verification if
		
		
		return false;
	})
	
	
	// FONCTION DETAILLE DU NIVEAU D'EXECUTION DES DOSSIERS

 function afficheDetailDossier(dossier){
	// alert(dossier);
	//  document.getElementById('code_dossier').value=dossier;
	 $.ajax({
		 type:'POST',
		 data:'dossier='+dossier,
		 url:"php/detaildossier.php",
		 success: function(data){
			 
			 $('#resultDossier').html(data);
			// alert('reussite');
			 $('#DetailDossier').modal({
				 
				 show:true,
				 backdrop:'static',
				 
		 });
	 
	 }

	 });
	 return false;
 }
	
	
	
	
	function surligne(champ, erreur){
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}
	
 </script>   
    
    
    


</body>

</html>

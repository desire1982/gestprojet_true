
<?php 
include('config/connectmysql.php');
include('deconnect_auto.php');
?>
 
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
	  include('menu/menu.php'); 
	   ?>
        

 <div id="page-wrapper">
   <div class="row dotation">
  <div class="col-lg-6">
  
  <h1 align="center"> FICHE DES Dossiers de projet de marche</h1>
  <p></p>
  
    <fieldset class="form-group" id="formulaire">
    <label for="dotation">Dossier</label>
    <div class="input-group"> 
 <div class="input-group-addon" style="font-weight:bold">Code dossier :</div>
  <input type="text" class="form-control " name="code_dossier" id="code_dossier" size="10" disabled ><input type="text" class="form-control " name="code_dossier_num" id="code_dossier_num" maxlength="3" size="3" >
  </div>
  <p></p> 
    <div class="input-group" ><span class="input-group-addon" id="basic-addon1" style="font-weight:bold">Provenance dossier:</span><span class="input-group-btn" id="basic-addon1"><button disabled id="AjoutOrigine"  class="btn btn-primary">+</button></span>
 <?php 
 //--------requete du menu attributaire
$requete1="SELECT *  FROM tbl_origine";
$resultat1=mysql_query($requete1); //Envoie une requête à un serveur MySQL

 ?>

 
  <select class="form-control" id="origine" name="origine">
<!-- Retourne une ligne de résultat MySQL sous la forme d'un tableau associatif-->
  
   <?php while($origines= mysql_fetch_array($resultat1)){ ?>
 <option value="<?php echo $origines['code_origine']; ?>">
 <?php echo $origines['origine']; ?> </option>
 <?php } ?>
   </select>
</div>
<p></p> 
    <div class="input-group" ><span class="input-group-addon" id="basic-addon1" style="font-weight:bold">Projet:</span><span class="input-group-btn" id="basic-addon1"><button disabled id="AjoutProjet"  class="btn btn-primary">+</button></span>
 <?php 
 //--------requete du menu projet
$requete1="SELECT *  FROM tbl_destination";
$resultat1=mysql_query($requete1); //Envoie une requête à un serveur MySQL

 ?>

 
  <select class="form-control" id="projet" name="origine">
<!-- Retourne une ligne de résultat MySQL sous la forme d'un tableau associatif-->
  
   <?php while($destinations= mysql_fetch_array($resultat1)){ ?>
 <option value="<?php echo $destinations['destination']; ?>">
 <?php echo $destinations['lib_destination']; ?> </option>
 <?php } ?>
   </select>
</div>
 <p></p>   
    <div class="input-group"> 
 <div class="input-group-addon" style="font-weight:bold">Objet :</div>
  <input type="text" class="form-control " name="objet_dossier" id="objet_dossier">
  </div>
   <p></p> 
    <div class="input-group" ><span class="input-group-addon" id="basic-addon1" style="font-weight:bold">Selectionner l'attributaire:</span><span class="input-group-btn" id="basic-addon1"><button  disabled id="AjoutAttributaire"  class="btn btn-primary">+</button></span>
 <?php 
 //--------requete du menu attributaire
$requete1="SELECT *  FROM tbl_attributaire";
$resultat1=mysql_query($requete1); //Envoie une requête à un serveur MySQL

 ?>

 
  <select class="form-control" id="attributaire" name="attributaire">
<!-- Retourne une ligne de résultat MySQL sous la forme d'un tableau associatif-->
  
   <?php while($attributaires= mysql_fetch_array($resultat1)){ ?>
 <option value="<?php echo $attributaires['code_attributaire']; ?>">
 <?php echo $attributaires['attributaire']; ?> </option>
 <?php } ?>
   </select>
</div>
<p></p>
 <div class="input-group" ><span class="input-group-addon" id="basic-addon1" style="font-weight:bold">Selectionner le financement:</span><span class="input-group-btn" id="basic-addon1"><button  id="AjoutFinancement"  class="btn btn-primary">+</button></span>
 <?php 
 //--------requete du menu source de financement
$requete1="SELECT *  FROM tbl_sourcefinprjt";
$resultat1=mysql_query($requete1); //Envoie une requête à un serveur MySQL

 ?>

 
  <select class="form-control" id="financement" name="financement[]" multiple="multiple">
<!-- Retourne une ligne de résultat MySQL sous la forme d'un tableau associatif-->
   <!--Utiliser le libellé de la table source de financement pour renseigner le champ financement-->
   <?php while($financements= mysql_fetch_array($resultat1)){ ?>
 <option value="<?php echo $financements['libFinPrjt']; ?>">
 <?php echo $financements['libFinPrjt']; ?> </option>
 
 <?php } ?>
 
 
  </select>
</div>
<p></p>
 <div class="input-group etat" ><span class="input-group-addon" id="basic-addon1" style="font-weight:bold">Montant financement:</span>
 <input type="text" class="form-control " name="montant_finan_prjt_marche" id="montant_finan_prjt_marche">
</div>
<p></p>

 <div class="input-group date_reception" ><span class="input-group-addon" id="basic-addon1" style="font-weight:bold">Date de reception:</span>
 <input type="text" class="form-control " name="date_reception" id="date_reception">
</div>
<?php /*?> <?php $ndate_reception=date('Y-m-d',strtotime($date_reception)); ?><?php */?>

<p></p>
 <div class="input-group etat" ><span class="input-group-addon" id="basic-addon1" style="font-weight:bold">Etat:</span>
 <input type="text" class="form-control " name="etat" id="etat">
</div>
<p></p>
  
  <!--Si l'Utilisateur est un visiteur on grise le bouton Valider-->
<?php if($role == 'visiteur') { ?>
<button  disabled id="dotation"  class="btn btn-primary">Valider</button>

<?php } ?>

 <!--Si l'Utilisateur est un admin ou projet on affiche le bouton Valider-->
<?php if($role == 'admin' || $role == 'projet' ) { ?>
<button  id="dotation"  class="btn btn-primary">Valider</button>
<?php } ?>
  
</fieldset>
  <!-- /.col-lg-6 -->
  
  <div id="message_affiche"></div>
   </div>
   
  <!-- /.row -->  
 </div> 
 
 
  <!-- FORMULAIRE D'AJOUT DE MONTANT DOTATION PAR NATURE --> 
 

 
 <div id="detail">
 
 </div>



     <!--MODAL PARA MOSTRAR EL DESTINATION -->
     <div class="modal fade" id="ajoutDest_M" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                     <h4 class="modal-title" id="myModalLabel"> <b> FICHE DES SOURCES DE FINANCEMENT </b> </h4>
                 </div>
                 <div class="modal-body" id="ajoutDestination_body">

                             <div class="form-group">
                             <label for="destination"><span class="glyphicon glyphicon-user"></span> Destination</label>
                             <input type="text" class="form-control" id="id_destination" name="id_destination" placeholder="Enter la destination">
                         </div>
                         <div class="form-group">
                             <label for="Lib_dest"><span class="glyphicon glyphicon-eye-open"></span> Libelle</label>
                             <input type="text" class="form-control" id="lib_destination" name="lib_destination" placeholder="entrer le libelle">
                         </div>
                         <input type="submit" value="enregistrer" class="btn btn-warning" id="enr_dest"/>
                        <!-- <input type="submit" value="editer" class="btn btn-warning" id="edi"/> -->




                 </div>
             </div>
         </div>
     </div>






     <!--MODAL PARA MOSTRAR EL NATURE -->





     <div class="modal fade" id="ajoutNAT_M" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                     <h4 class="modal-title" id="myModalLabel"> <b> FICHE DES NATURES </b> </h4>
                 </div>
                 <div class="modal-body" id="ajoutNature_body">


                     <ul class="nav nav-tabs">
                         <li role="presentation" class="active"><a data-toggle="tab" href="#Nature">Nature</a>
</li>
                         <li role="presentation"><a data-toggle="tab" href="#Recherche">Recherche</a></li>
                         <li role="presentation"><a data-toggle="tab" href="#">Messages</a></li>
                     </ul>


                     <div class="tab-content">

                         <div id="Nature" class="tab-pane fade in active">
                             <div class="row">
                                 <div class="col-md-4">
                     <div class="form-group">
                         <label for="nature"><span class="glyphicon glyphicon-user"></span> Nature</label>
                         <input type="text" class="form-control" id="id_nature" name="id_nature" placeholder="Enter la nature">
                     </div>
                                 </div>
                                 <div class="col-md-4">
                     <div class="form-group">
                         <label for="Lib_nature"><span class="glyphicon glyphicon-eye-open"></span> Libelle</label>
                         <input type="text" class="form-control" id="lib_nature" name="lib_nature" placeholder="entrer le libelle">
                     </div>
                                 </div>

                                 </div>
                                     <div class="row">
                                         <div class="col-md-8 col-md-offset-4">
                     <input type="submit" value="enregistrer" class="btn btn-warning" id="enr_nature"/>
                                         </div>
                                      </div>


                         </div>




                         <div id="Recherche" class="tab-pane fade">
                             <div class="form-group">
                                 <label for="nature"><span class="glyphicon glyphicon-user"></span> Nature</label>
                                 <input type="text" class="form-control" id="id_nature" name="id_nature" placeholder="Enter la nature">
                             </div>
                             <div class="form-group">
                                 <label for="Lib_nature"><span class="glyphicon glyphicon-eye-open"></span> Libelle</label>
                                 <input type="text" class="form-control" id="lib_nature" name="lib_nature" placeholder="entrer le libelle">
                             </div>
                             <input type="submit" value="rechercher" class="btn btn-warning" id="enr_nature"/>


                         </div>
                     </div>





                 </div>
             </div>
         </div>
     </div>





 <!-- /.page-wrapper -->                       
</div>




    <!-- jQuery -->
    <script src="module/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="module/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="menu/js/metisMenu.min.js"></script>

    
    <!-- Custom Theme JavaScript -->
    <script src="menu/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    
<script type="text/javascript">
$(function(){
	
	
	// Attribution de code du dossier en cliquant sur provenance dossier
	 $('#origine').on('change', function(){
		 var d = new Date(); 
	var origine = $('#origine').val();
	    var lettre = d.getFullYear();
        $('#code_dossier').val(origine+'-'+lettre);
		alert( $('#code_dossier').val()+'-'+lettre);
    });
	
	

    //Click du bouton Ajout destination
    $('#AjoutDestination').on('click', function(){
        alert('vous ete')
        document.getElementById('id_destination').value=""
        document.getElementById('lib_destination').value="";
        $('#ajoutDest_M').modal({
            show:true,
            backdrop:'static'

        });
    });

//Bouton enregistrer de la fenetre modale

    $('#enr_dest').on('click', function(){
        alert('vous ete le meme')
var destinati = document.getElementById('id_destination').value;
var lib_destination = document.getElementById('lib_destination').value;


        $.ajax({
            type:'POST',
            url:'php/nlle_destination.php',
            data:'destinati='+destinati+'&lib_destination='+lib_destination,
            success:function(resultat){

                $.ajax({
                    url: 'php/refresh_destination.php',
                    success: function(data) {
                      // $('#destination option').remove();
                        var resultatObj = JSON.parse(data);

                        $.each(resultatObj,function(key,val){
                       // console.log(val.destination);
                       $('#destination').append('<option value="'+val.destination+'">'+ val.lib_destination +'</option>');
                        });
                    }
                });

                $("#destination").removeAttr('selected').find('option:first').attr('selected','selected')
            }



        })
    });



   //Click du bouton Ajout Nature
    $('#AjoutNature').on('click', function(){
        alert('vous ete')
        document.getElementById('id_nature').value=""
        document.getElementById('lib_nature').value="";
        $('#ajoutNAT_M').modal({
            show:true,
            backdrop:'static'

        });
    });

    //Bouton enregistrer de la fenetre modale

    $('#enr_nature').on('click', function(){
        alert('vous ete le meme')
        var nature = document.getElementById('id_nature').value;
        var lib_nature = document.getElementById('lib_nature').value;


        $.ajax({
            type:'POST',
            url:'php/nlle_nature.php',
            data:'nature='+nature+'&lib_nature='+lib_nature,
            success:function(resultat){
                $('#destination option').remove();
                $.ajax({
                    url: 'php/refresh_nature.php',
                    success: function(data) {
                         
                        var resultatObjNature = JSON.parse(data);

                        $.each(resultatObjNature,function(key,val){
                            // console.log(val.destination);
                            $('#nature').append('<option value="'+val.id_nature+'">'+ val.lib_nature +'</option>');
                        });
                    }
                });

             //   $("#destination").removeAttr('selected').find('option:first').attr('selected','selected')
            }



        })
    });


// tab de nature


    $('.nav-tabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })


// Au demarrage on cache les select annee et nature
    $('.annee_group').hide();
    $('.nature_group').hide();


// Quand on clique sur la destination, l'année s'affiche
    $('#destination').on('change', function(){
        $('.annee_group').show();
    });

// Quand on clique sur la destination, l'année s'affiche
    $('#annee').on('change', function(){
        $('.nature_group').show();
    });

	$('#annee').on('change', function(){ 
	var annees = $('#annee').val();
	});
	
	$('#nature').on('change', function(){ 
	var natures = $('#nature').val();
	});

$('#dotation').on('click', function(){
	
	
	
	var code_dossier = $('#code_dossier').val();
	var code_dossier_num = $('#code_dossier_num').val();
	var origine = $('#origine').val();
	var projet = $('#projet').val();
	var objet_dossier = $('#objet_dossier').val(); 
	var attributaire = $('#attributaire').val();
	var financement = $('#financement').val();
	var montant_finan_prjt_marche = $('#montant_finan_prjt_marche').val();
	var date_reception = $('#date_reception').val();
	
	
	
	alert(code_dossier+origine+objet_dossier+attributaire+financement+date_reception+code_dossier_num);
	if(montant_finan_prjt_marche.length>0){
		//alert(projet+montant_v+source_finance);
	$.ajax({
		
		type:'POST',
		data:'code_dossier='+code_dossier+'&code_dossier_num='+code_dossier_num+'&origine='+origine+'&projet='+projet+'&objet_dossier='+objet_dossier+'&attributaire='+attributaire+'&financement='+financement+'&montant_finan_prjt_marche='+montant_finan_prjt_marche+'&date_reception='+date_reception,
		url:'php/dossier_projet_enr.php',
		success: function(data){
			if(data == 'existe'){
				alert('Le dossier existe déjà dans la base');
		$('#message_affiche').html('<p class="alert alert-warning"> les informations existent dans la base </p>');	
		//$('#enrMontant').focus();
		//alert('ce montant existe déjà'+montant);
	     
			}else{
				alert('vous avez pu enregistrer');
				$('#formulaire')[0].reset();
		
		$('#enrMontant').focus();
		$('#detail').html(data);
		$('#message_affiche').html('<p class="alert alert-warning"> l\'enregistrement s\'est bien deroulé </p>');
			}
	
}


})

	}else{
		alert('Veuillez renseigner le montant');
		$('#montant_finan_prjt_marche').focus();
		}
	

})

// bouton supprimer de l'affichege
//$('.supprimer').on('click', function(){
$(document).on("click", ".supprimer", function(){
		var id_dotation= $(this).attr("id");
		var confirmation = confirm('Voulez vous supprimer cet enregistrement ?')
		if(confirmation==true){
		$.ajax({
		type:'POST',
		data:'id_dotation='+id_dotation,
		url:'php/dotation_supp.php',
		success: function(resultat){		
			var param=$('#destination').val();
			var annee= $('#annee').val();
		
			$("#detail").load("php/dotations_details.php",{'code_projet':param,'annee':annee});
			
		}
		
		
	});
	
		}else{
		return false;	
			
			}
	});






})


</script>



</body>

</html>

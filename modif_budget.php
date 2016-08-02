
<?php 
include('config/connectmysql.php');
?>
 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GestProjet V1</title>

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

 <!-- Bootstrap Date-Picker CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

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
   <div class="row">
  <div class="col-lg-6">
  
  <h1 align="center"> FICHE DES MODIFICATIONS</h1>
  <p></p>
  
    <fieldset class="form-group">
    <label for="dotation">Modification</label>
    <div class="input-group "><span class="input-group-addon" id="basic-addon1">Reference:</span>
    <input type="text" class="form-control " name="ref_modif" id="ref_modif">
</div>
<p></p>
    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Selectionner le projet:</span><span class="input-group-btn" id="basic-addon1"><button  id="AjoutDestination"  class="btn btn-primary">+</button></span>
 <?php 

 //--------requete du menu destination
$requete1="SELECT *  FROM tbl_destination";
$resultat1=mysql_query($requete1);

 //--------requete du menu destination
$requete2="SELECT *  FROM tbl_nature";
$resultat2=mysql_query($requete2);
 ?>

 
  <select class="form-control" id="destination" name="destination_affiche">
   <?php while($destinations= mysql_fetch_array($resultat1)){ ?>
 <option value="<?php echo $destinations['destination']; ?>">
 <?php echo $destinations['lib_destination']; ?> </option>
 
 <?php } ?>
 
 
  </select>
</div>
<p></p>
  <div class="input-group source_group"><span class="input-group-addon" id="basic-addon1">Selectionner la source:</span>
    <span class="input-group-btn" id="basic-addon1"><button  id="AjoutSource"  class="btn btn-primary">+</button></span>
 <select class="form-control source_finance" id="source_finance" name="source_finance">
 <!-- Retourne une ligne de résultat MySQL sous la forme d'un tableau associatif-->
    <?php 
	 //--------requete du menu source
$req_source="SELECT *  FROM tbl_source_finance_dotation";
$res_source=mysql_query($req_source); //Envoie une requête à un serveur MySQL
	
	while($sources= mysql_fetch_array($res_source)){ ?>
 <option value="<?php echo $sources['code_source_dotation']; ?>">
 <?php echo $sources['lib_sourceF']; ?> </option>
 
 <?php } ?>
  </select> 
  </div>

<p></p>
<div class="input-group nature_group"><span class="input-group-addon" id="basic-addon1">Selectionner la nature:</span>
    <span class="input-group-btn" id="basic-addon1"><button  id="AjoutNature"  class="btn btn-primary">+</button></span>
<select class="form-control nature" id="nature" name="nature_lib">
    <?php while($natures= mysql_fetch_array($resultat2)){ ?>
 <option value="<?php echo $natures['id_nature']; ?>">
 <?php echo $natures['lib_nature']; ?> </option>
 
 <?php } ?>
  </select>
  </div>
  <P></P>
 <div class="input-group "><span class="input-group-addon" id="basic-addon1">Types:</span>
  <select class="form-control" id="type_actes" name="type_actes">
      <option >---TYPE--</option>
    <option value="arrete">Arrêté</option>
  </select>
</div>
<P></P>
<div class="input-group date" data-provide="datepicker">
<span id="basic-addon1" class="input-group-addon">Date:</span>
<input type="text" class="form-control" id="date_modif"><div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>

<div class="row">
 <div class="col-lg-10"> 
 <fieldset class="form-group" >
 <legend for="Type modification">Type de modification</legend>
  <label class="radio-inline">
  <input type="radio" name="type_modif" value="ajouter" id="type_modif">Ajouter</label>
<label class="radio-inline">
<input type="radio" name="type_modif" value="diminuer" id="type_modif">Diminuer</label>
</fieldset>
  <div class="input-group ">
  <span class="input-group-addon" id="basic-addon2">Montant:</span>
  <span class="input-group-btn" id="basic-addon2"><button class="btn btn-default" type="button" value="-" name="type_oper" id="type_oper"><b>-</b></button></span>
  <input type="text" class="form-control " name="montant_actes" id="montant_actes" >
  </div>
  </div>
  
  </div>
<P></P>

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
    <!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

    
    
<script type="text/javascript">
$(function(){
	
	// Ajout du signe + ou - 
	
	$( "input[name=type_modif]" ).on( "click", function() {

 if($('input[name=type_modif]:checked').val()=='ajouter'){
	  $('#type_oper').hide();
	 
	 }else{
		  $('#type_oper').show();

		 
		 }
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

                $.ajax({
                    url: 'php/refresh_nature.php',
                    success: function(data) {
                        // $('#destination option').remove();
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



// Quand on clique sur la destination, l'année s'affiche
 
	 $('#destination').on('change', function(){
       var destination = $('#destination').val();
	   console.log(destination);
		
    });

$('#nature').on('change', function(){ 
	var natures = $('#nature').val();
	console.log(natures);
	});
	
	

$('#dotation').on('click', function(){
	var reference = $('#ref_modif').val();
	var destinations = $('#destination').val();
	var natures = $('#nature').val();
	var source_finance = $('#source_finance').val();
	var type_actes = $('#type_actes').val();
	var date_modif = $('#date_modif').val();
	var type_modif = $('#type_modif').val();
	var type_oper = $('#type_oper').val();
	
	
	
	if($('input[name=type_modif]:checked').val()=='ajouter'){
	 var montant_modif = $('#montant_actes').val();
	 
	 }else{
		 var montant_modif ='-'+$('#montant_actes').val();
		 }
	
	console.log(destination + montant_modif);
	if(montant_modif.length>0){
		//alert(projet+source+montant);SS
	$.ajax({
		
		type:'POST',
		data:'reference='+reference+'&destinations='+destinations+'&natures='+natures+'&source_finance='+source_finance+'&type_actes='+type_actes+'&type_modif='+type_modif+'&date_modif='+date_modif+'&type_oper='+type_oper+'&montant_modif='+montant_modif,
		url:'php/modif_budg_enr.php',
		success: function(data){
			if(data == 'existe'){
		$('.detail').html('<p class="alert alert-warning"> les informations existent dan la base </p>');	
		//$('#enrMontant').focus();
		//alert('ce montant existe déjà'+montant);
	     
			}else{
				
				alert('vous avez pu enregistrer');
				
		
		$('#enrMontant').focus();
		$('#detail').html(data);
		//$('#mensaje').html('<p class="alert alert-warning"> le montant doit est exate </p>');
			}
	
}


})

	}else{
		alert('Veuillez renseigner le montant');
		$('#montant_v').focus();
		}
	

})


// Ajout du datepicker

$('.date').datepicker({
            format: 'mm-dd-yyyy',
            startDate: '01/01/2010',
            endDate: '12/30/2020',
        })



})


</script>



</body>

</html>

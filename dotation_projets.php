
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
    
    <style type="text/css">
	
.object_ok
{
border: 1px solid green; 
color: #333333; 
}
 
.object_error
{
border: 1px solid #AC3962; 
color: #333333; 
}
	</style>
    

</head>

<body>

    <div id="wrapper">

       <?php 
	  include('menu/menu.php'); 
	   ?>
        

 <div id="page-wrapper">
   <div class="row dotation">
  <div class="col-lg-6">
  
  <h1 align="center"> FICHE DES DOTATIONS</h1>
  <p></p>
  
    <fieldset class="form-group">
   
    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Selectionner le projet:</span><span class="input-group-btn" id="basic-addon1"><button  id="AjoutDestination"  class="btn btn-primary">+</button></span>
 <?php 
 //--------requete du menu destination
$requete1="SELECT *  FROM tbl_destination ORDER BY destination ASC";
$resultat1=mysql_query($requete1);

 //--------requete du menu nature
$requete2="SELECT *  FROM tbl_nature";
$resultat2=mysql_query($requete2);

 //--------requete du menu source
$req_source="SELECT *  FROM tbl_source_finance_dotation";
$res_source=mysql_query($req_source); //Envoie une requête à un serveur MySQL


 ?>

 
  <select class="form-control" id="destination" name="destination_affiche">
<!-- Retourne une ligne de résultat MySQL sous la forme d'un tableau associatif-->
              <option >---DESTINATION--</option>
   <?php while($destinations= mysql_fetch_array($resultat1)){ ?>
 <option value="<?php echo $destinations['destination']; ?>">
 <?php echo $destinations['lib_destination']; ?> </option>
 
 <?php } ?>
 
 
  </select>
</div>
<p></p>
 <div class="input-group annee_group"><span class="input-group-addon" id="basic-addon1">Selectionner l'année:</span>
  <select class="form-control" id="annee" name="annee">
      <option >---ANNEE--</option>
    <option value="2016">2016</option>
    <option value="2015">2015</option>
    <option value="2014">2014</option>
    <option value="2013">2013</option>
    <option value="2012">2012</option>
  </select>
</div>
<p></p>
<div class="input-group nature_group"><span class="input-group-addon" id="basic-addon1">Selectionner la nature:</span>
    <span class="input-group-btn" id="basic-addon1"><button  id="AjoutNature"  class="btn btn-primary">+</button></span>
<select class="form-control nature" id="nature" name="nature_lib">
    <?php while($natures= mysql_fetch_array($resultat2)){ ?>
 <option value="<?php echo $natures['id_nature']; ?>">
 <?php echo $natures['id_nature'].'-'.$natures['lib_nature']; ?> </option>
 
 <?php } ?>
  </select>
  </div>
  <p></p>
  <div class="input-group source_group"><span class="input-group-addon" id="basic-addon1">Selectionner la source:</span>
    <span class="input-group-btn" id="basic-addon1"><button  id="AjoutSource"  class="btn btn-primary">+</button></span>
 <select class="form-control source_finance" id="source_finance" name="source_finance">
 <!-- Retourne une ligne de résultat MySQL sous la forme d'un tableau associatif-->
    <?php while($sources= mysql_fetch_array($res_source)){ ?>
 <option value="<?php echo $sources['code_source_dotation']; ?>">
 <?php echo $sources['lib_sourceF']; ?> </option>
 
 <?php } ?>
  </select> 
  </div>
  <p></p>
 <div class="input-group"> 
 <div class="input-group-addon">Montant :</div>
  <input type="text" class="form-control " name="montant_v" id="montant_v">
  </div>
<P></P>

<!--Si l'Utilisateur est un visiteur on grise le bouton Valider-->
<?php if($role == 'visiteur') { ?>
<button disabled  id="dotation"  class="btn btn-primary">Valider</button>
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



     <!--FENETRE MODALE DE DESTINATION -->
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






     <!--FENETRE MODALE DE NATURE -->





     <div class="modal fade" id="ajoutNAT_M" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                     <h4 class="modal-title" id="myModalLabel"> <b> FICHE DES NATURES </b> </h4>
                 </div>
                 
                 <div class="modal-body" id="ajoutNature_body">

                           <!-- Nav tabs -->
                           
                     <ul class="nav nav-tabs">
                         <li role="presentation" class="active"><a data-toggle="tab" href="#Nature">Nature</a>
</li>
                         <li role="presentation"><a data-toggle="tab" href="#Recherche">Recherche</a></li>
                         <li role="presentation"><a data-toggle="tab" href="#Message">Messages</a></li>
                     </ul>

                        <!-- Tab panes -->
                     <div class="tab-content">

                     <!-- Tab panes Nature -->  
                         <div id="Nature" class="tab-pane fade in active">
                             <div class="row">
                                 <div class="col-md-4">
                     <div class="form-group">
                         <label for="nature"><span class="glyphicon glyphicon-user"></span> Nature</label>
                         <input type="text" class="form-control" id="id_nature" name="id_nature" placeholder="Enter la nature">
                         <div width="400" align="left" id="status"></div>
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
                     <input type="submit" value="enregistrer" class="btn btn-success" id="enr_nature"/>
                                         </div>
                                      </div>


                         </div>

                          <!-- Tab panes Recherche -->  


                         <div id="Recherche" class="tab-pane fade">
                             <div class="form-group">
                                 <label for="nature"><span class="glyphicon glyphicon-user"></span> Nature</label>
                                 <input type="text" class="form-control" id="id_nature" name="id_nature" placeholder="Enter la nature">
                             </div>
                             <div class="form-group">
                                 <label for="Lib_nature"><span class="glyphicon glyphicon-eye-open"></span> Libelle</label>
                                 <input type="text" class="form-control" id="lib_nature" name="lib_nature" placeholder="entrer le libelle">
                             </div>
                             <input type="submit" value="rechercher" class="btn btn-success" id="enr_nature"/>


                         </div>
                         
                         
                      <!-- Tab panes Message -->    
                         <div id="Message" class="tab-pane fade">
                             <div class="form-group">
                                 <label for="nature"><span class="glyphicon glyphicon-user"></span>Message</label>
                                 <input type="text" class="form-control" id="id_nature" name="id_nature" placeholder="Enter la nature">
                             </div>
                             <div class="form-group">
                                 <label for="Lib_nature"><span class="glyphicon glyphicon-eye-open"></span> Libelle</label>
                                 <input type="text" class="form-control" id="lib_nature" name="lib_nature" placeholder="entrer le libelle">
                             </div>
                             <input type="submit" value="rechercher" class="btn btn-success" id="enr_nature"/>


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
pic1 = new Image(16, 16); 
pic1.src = "images/loader.gif";

$(function(){

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

           //     $.ajax({
           //         url: 'php/refresh_destination.php',
            //        success: function(data) {
                   
                        var resultatObj = JSON.parse(resultat);

                        $.each(resultatObj,function(key,val){
                       // console.log(val.destination);
                       $('#destination').append('<option value="'+val.destination+'">'+ val.lib_destination +'</option>');
                       });
                   
				 
				 
				 
				 
				 //  $('#destination').append(
     //   $('<option></option>').html(resultat)
   //  );   
				    }
                });
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


//Activation de l'onglet Nature 

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
	var projet = $('#destination').val();
	var annee = $('#annee').val();
	var nature = $('#nature').val(); 
	var source_finance = $('#source_finance').val();
	var montant_v = $('#montant_v').val();
	if(montant_v.length>0){
		//alert(projet+montant_v+source_finance);
	$.ajax({
		
		type:'POST',
		data:'projet='+projet+'&annee='+annee+'&nature='+nature+'&source_finance='+source_finance+'&montant_v='+montant_v,
		url:'php/dotation_enr.php',
		success: function(data){
			if(data == 'existe'){
				alert('La dotation existe déjà');
		$('.detail').html('<p class="alert alert-warning"> les informations existent dan la base </p>');	
		//$('#enrMontant').focus();
		//alert('ce montant existe déjà'+montant);
	     
			}else{
				alert('vous avez pu enregistrer');
		
		$('#enrMontant').focus();
		$('#detail').html(data);
		$('#message_affiche').html('<p class="alert alert-warning"> l\'enregistrement s\'est bien deroulé </p>');
			}
	
}


})

	}else{
		alert('Veuillez renseigner le montant');
		$('#montant_v').focus();
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


// Verification de la disponiblité de la nature de depense dans la base

$("#id_nature").change(function() {

 
var ntr = $("#id_nature").val();
 alert(ntr);
if(ntr.length >= 4)
{
$("#status").html('<img src="images/loader.gif" align="absmiddle">&nbsp;Checking availability...');
 
    $.ajax({  
    type: "POST",  
    url: "php/verif_nature.php",  
    data: "ntr="+ntr,  
    success: function(msg){  
    
   $("#status").ajaxComplete(function(event, request, settings){ 
 
    if(msg == 'OK')
    { 
        $("#id_nature").removeClass('object_error'); // if necessary
        $("#id_nature").addClass("object_ok");
        $(this).html('&nbsp;<img src="images/tick.gif" align="absmiddle">');
    }  
    else 
    {  
        $("#id_nature").removeClass('object_ok'); // if necessary
        $("#id_nature").addClass("object_error");
        $(this).html(msg);
    }  
    
   });
 
 } 
    
  }); 
 
}
else
    {
    $("#status").html('<font color="red">' +
'The username should have at least <strong>4</strong> characters.</font>');
    $("#username").removeClass('object_ok'); // if necessary
    $("#username").addClass("object_error");
    }
 
});




})


</script>



</body>

</html>

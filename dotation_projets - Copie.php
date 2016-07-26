
<?php 
include('/config/connectmysql.php');
?>
 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">GESTPROJET v2.0</a>
            </div>
            <!-- /.navbar-header -->

            
            
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> PROJET</a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="destination_details.php">
                                    
                                    DESTINATION</a>
                                </li>
                                <li>
                                    <a href="source_financeprojet.php">FINANCEMENT</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> BUDGET</a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="dotation_projets.php>DOTATION</a>
                                </li>
                                <li>
                                    <a href="modif_budget.php">MODIFICATION BUDGETAIRE</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> DETAILS<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="detailsdotation_projets.php">Details dotation</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level </span></a>
                                    
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

 <div id="page-wrapper">
   <div class="row">
  <div class="col-lg-6">
  
  <h1 align="center"> FICHE DES DOTATIONS</h1>
  <p></p>
  
    <fieldset class="form-group">
    <label for="dotation">Dotation</label>
    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Selectionner le projet:</span><span class="input-group-addon" id="basic-addon1"><button  id="AjoutDestination"  class="btn btn-primary">+</button></span>
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
<div class="input-group nature_group"><span class="input-group-addon" id="basic-addon1">Selectionner la nature:</span>
    <span class="input-group-addon" id="basic-addon1"><button  id="AjoutNature"  class="btn btn-primary">+</button></span>
<select class="form-control nature" id="nature" name="nature_lib">
    <?php while($natures= mysql_fetch_array($resultat2)){ ?>
 <option value="<?php echo $natures['id_nature']; ?>">
 <?php echo $natures['lib_nature']; ?> </option>
 
 <?php } ?>
  </select>
  </div>
  <input type="text" class="form-control " name="montant_v" id="montant_v">
<P></P>
<button  id="dotation"  class="btn btn-primary">Valider</button>
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
    
<script type="text/javascript">
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
	var projet = $('#destination').val();
	var annee = $('#annee').val();
	var nature = $('#nature').val();
	var montant_v = $('#montant_v').val();
	if(montant_v.length>0){
		//alert(projet+source+montant);
	$.ajax({
		
		type:'POST',
		data:'projet='+projet+'&annee='+annee+'&nature='+nature+'&montant_v='+montant_v,
		url:'php/dotation_enr.php',
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

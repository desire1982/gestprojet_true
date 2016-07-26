<?php
include('/config/connect.php'); 
session_start();
//$msg='';
?>


<?php
	  $sql_verif="SELECT * FROM tbl_destination WHERE destination ='".$_SESSION['numdestination']."'";
	  echo $sql_verif;
	  $res=$mysqli->query("$sql_verif");
	  $count=$res->num_rows;
	   $row = $res->fetch_assoc();
	  if($count>=1){

$msg='<p></p>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong>Bien enregistrer</strong> cliquez sur le lien pour  <span id="IL_AD12" class="IL_AD">retourner</span> <a href="destination.php">Nouveau</a>.
</div>
<a href="destination.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back</a>';


	 }


	
	 $mysqli->close();
   
  
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
 <?php 
require('entete.php');
require('navigationgauche.php');
?>


        </nav>

        <div id="page-wrapper">
            <div class="row">
              
                <div class="col-lg-12">
                    <h1 class="page-header">DESTINATION</h1>
                </div>
                <!-- /.col-lg-12 -->
           
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                          
                
                    <div class="panel panel-default">
                        <div class="panel-heading" id="tableau_affiche">
                        
                        <form role="form" method="post" action="destinations.php">
                            Gestion des destinations
                              <div class="pull-right">  <button type="submit" name="nouveau" id="nouveau" class="btn btn-default">NOUVEAU</button> <button type="submit" name="nouveau_ref" id="nouveau_ref" class="btn btn-default">NOUVEAU</button>  <button type="reset" class="btn btn-default" id="fermer">FERMER</button></div>
                        </div>
                        <div class="panel-body" >
                            <div class="row">
                                <div class="col-lg-6">
                                                 <?php
  if(isset($msg)){
   echo $msg;
  }
  else{
   ?>
            <div class='alert alert-info'>
    <span class='glyphicon glyphicon-asterisk'></span> &nbsp; Tous les champs sont obligatoires !
   </div>
            <?php
  }
  ?>
                                    
                                        <div class="form-group" id="destinations_entree">
                                            <label>Destination</label>
                                            <input class="form-control" name="destination" id="destination" value=" <?php echo $row['destination']; ?> " disabled ='disabled'>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Libelle</label>
                                            <input class="form-control" name="lib_destination" id="lib_destination" value=" <?php echo $row['lib_destination']; ?> " disabled ='disabled'>
                                        </div>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                            </div>
                            <!-- /.row (nested) -->
                            </form>
                        </div>
                        <!-- /.panel-body -->
                        
                         <!-- /.2emepanel-body -->
                        <div class="panel panel-default" id="nouvelle_destination">
           
                        
                        <form role="form" method="post" action="destinations.php">
                            
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <label>Destination</label>
                                            <input class="form-control" name="destination" id="destination" placeholder="Entrer la destination">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Libelle</label>
                                            <input class="form-control" name="lib_destination" id="lib_destination" placeholder="Entrez le libelle">
                                        </div>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                            </div>
                            <!-- /.row (nested) -->
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.2eme panel -->
                        
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        
		$('#nouvelle_destination').hide();
		$('#tableau_affiche').show();
	//	 $('#submit').prop(disabled, true);
  
		
		
//	$('#destinationcache').toggle(function(){
	//$('#destinationcache').text();
//	$('#destinationcache').hide();
//	}, function(){
//		$('#destinationcache').text('montrer');
		//$('#destinationcache').show();
	//	});
	
  
	// $('#destinations_entree').hide(100).delay(1000).show(200); 
  
});
	
$('#nouveau').click(function(){
 // $('#destinationcache').toggle();
  $('#nouvelle_destination').show(); 
   $('#tableau_affiche').hide();
  // $('#supprimer').hide();
   $("#enregistrer").attr('disabled', 'disabled');
	
});
	
    </script>

</body>

</html>

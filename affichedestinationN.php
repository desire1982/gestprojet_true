<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GESTION DES PROJETS</title>

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


<?php
include('/config/connect.php'); 
//$msg='';
//if(isset($_POST['enregistrer'])){
	
 if(empty($_POST['destination'])){
echo 'la destination existe';


echo'<div class="panel panel-default">
                        <div class="panel-heading">
                        
                        <form role="form" method="post" id="formdestinationN" action="affichedestination.php">
                            Gestion des destinations
                              
                        </div>
                        <div class="panel-body" id="tableauN">
                            <div class="row">
                                <div class="col-lg-6">';
// <?php       $sql_affiche="SELECT * FROM tbl_destination WHERE destination ='".$_POST['destination']."'";  
//	  $res_affiche=$mysqli->query("$sql_affiche"); 
//	   $row = $res_affiche->fetch_assoc();  
	   
	   ?> 
	                             
<?php echo'<div class="form-group" id="destinations_entree">
                                            <label>Destination</label>
                                            <input class="form-control" name="destination" id="destination" placeholder="Entrer la destination" value=" <?php echo $row["destination"]; ?> " disabled =\'disabled\'>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Libelle</label>
                                            <input class="form-control" name="lib_destination" id="lib_destination" placeholder="Entrez le libelle" value=" <?php echo $row["lib_destination"]; ?> " disabled =\'disabled\' >
                                        </div>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                            </div>
                            <!-- /.row (nested) -->
                            </form>
                        </div>';
                       

exit();	 	 
	 
 }else{
	
  if($_POST['destination']!=null && $_POST['lib_destination']!=null){
	// Verifie si la destination existe  
	  $sql_verif="SELECT destination FROM tbl_destination WHERE destination ='".$_POST['destination']."'";
	  
	  $res=$mysqli->query("$sql_verif");
	  $count=$res->num_rows;
	  
	  if($count==0){
	  
     $stmt = $mysqli->prepare("INSERT INTO tbl_destination(destination,lib_destination) VALUES (?,?)");
	// var_dump($stmt);
     $stmt->bind_param('ss', $destination, $lib_destination);
 
     $destination = $_POST['destination'];
     $lib_destination = $_POST['lib_destination'];
 
     if($stmt->execute()){
	 
	 $msg="<div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Données bien enregistrées ! <a href=\"destination1.php\"> Retour </a>
	  <button type=\"submit\" name=\"nouveauN\" id=\"nouveauN\" class=\"btn btn-default\">NOUVEAU</button>
     </div>";
	 echo $msg;
	 
	 ?>
     
     
	 <div class="panel panel-default">
                        <div class="panel-heading">
                        
                        <form role="form" method="post" id="formdestinationN" action="affichedestinationN.php">
                            Gestion des destinations
                              
                        </div>
                        <div class="panel-body" id="tableauN">
                            <div class="row">
                                <div class="col-lg-6">';
 <?php       $sql_affiche="SELECT * FROM tbl_destination WHERE destination ='".$_POST['destination']."'";  
	  $res_affiche=$mysqli->query("$sql_affiche"); 
	   $row = $res_affiche->fetch_assoc();  
	   
	   ?> 
	                             
<div class="form-group" id="destinations_entree">
                                            <label>Destination</label>
                                            <input class="form-control" name="destination" id="destination" placeholder="Entrer la destination" value=" <?php echo $row['destination']; ?> " disabled ='disabled'>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Libelle</label>
                                            <input class="form-control" name="lib_destination" id="lib_destination" placeholder="Entrez le libelle" value=" <?php echo $row['lib_destination']; ?> " disabled ='disabled' >
                                        </div>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                            </div>
                            <!-- /.row (nested) -->
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    
	 
<?php	 
	 }}else{
		echo 'donnee_deja'; 
		?>
		
		 <div class="panel panel-default">
                        <div class="panel-heading">
                        
                        <form role="form" method="post" id="formdestinationN" action="affichedestinationN.php">
                            Gestion des destinations
                              
                        </div>
                        <div class="panel-body" id="tableauN">
                            <div class="row">
                                <div class="col-lg-6">';

	                             
<div class="form-group" id="destinations_entree">
                                            <label>Destination</label>
                                            <input class="form-control" name="destination" id="destination" placeholder="Entrer la destination" value="" disabled ='disabled'>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Libelle</label>
                                            <input class="form-control" name="lib_destination" id="lib_destination" placeholder="Entrez le libelle" value="" disabled ='disabled' >
                                        </div>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                            </div>
                            <!-- /.row (nested) -->
                            </form>
                        </div>
                        <!-- /.panel-body -->
<?php		 
		 }
	 
	 }}
?>

 <!-- jQuery -->
    <script src="module/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="module/bootstrap/js/bootstrap.min.js"></script>
    </body>

</html>
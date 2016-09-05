<?php
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
		//session_start();
	  include('menu/menu.php'); 
	  $role = $_SESSION['role'];
	 
	   ?>

 <div id="page-wrapper">
            <div class="row">
              
            <div class="row">
                <div class="col-lg-8 col-md-offset-1">
 
 <table width="200" border="1" style="margin-left:100px; margin-top:15px; margin-bottom:15px">
  <tr>
    <td><input name="dest" id="dest" type="text"/></td>
    <td><button  id="nouveau_dest"  class="btn btn-primary">Nouvelle Destination</button></td>
  </tr>
</table>

                
               
                
      <div id="affiche_destination" >  
	 <table class="table table-striped table-condensed table-hover">
     <tr>
     <th width="300"> destination </th>
     <th width="200"> libellee destination </th>
     <th width="200"> option </th>
     </tr>
     <tr>
     <?php

    include('config/connect.php'); 
   $sql_affiche="SELECT * FROM tbl_destination ORDER BY destination ASC";
 
	 
	  $res_affiche=$mysqli->query("$sql_affiche"); 
	    
	   
	   while($row = $res_affiche->fetch_assoc()){
	   
	   ?> 
       
<td><?php echo $row['destination']; ?> </td>
<td><?php echo $row['lib_destination']; ?></td>
<td>
 <!--Si l'Utilisateur est un administrateur on affiche le bouton Editer-->
<?php if($role == 'admin') { ?>
<button class="btn btn-primary" onClick="editerDestination('<?php echo $row['destination']; ?>')">Editer</button>
<?php } ?> 
 <!--Si l'Utilisateur est un visiteur on grise le bouton Editer-->
<?php if($role == 'visiteur') { ?>
<button disabled class="btn btn-primary" onClick="editerDestination('<?php echo $row['destination']; ?>')">Editer</button>
<?php } ?> 
 <!--Si l'Utilisateur est un visiteur on grise le bouton Supprimer-->
<?php if($role == 'visiteur') { ?>
<button disabled class="btn btn-primary" onClick="eliminerDestination('.$row['destination'].')">Supprimer</button>
<?php } ?>
 <!--Si l'Utilisateur est un admin ou projet on affiche le bouton Suprimer-->
<?php if($role == 'admin' ||$role == 'projet' ) { ?>
<button class="btn btn-primary" onClick="eliminerDestination('.$row['destination'].')">Supprimer</button>
<?php } ?>


<a href="javascript:editerDestination('<?php echo $row['destination']; ?>');" class="glyphicon glyphicon-edit"></a><a href="javascript:eliminerDestination('<?php echo $row['destination']; ?>')" class="glyphicon glyphicon-remove-circle"></a></td> 
</tr>

   <?php 
	   }
	   ?>
      
</table>
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
    
    <!--MODAL DE GESTION DES DESTINATIONS-->

<div class="modal fade" id="fiche-destination" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Fiche de destination</h4>
        </div>
        <div class="modal-body">
          <form role="form" id="form_destination" onSubmit="return modifierDestination();" action="" method="post">
              <input type="text" class="form-control" id="pro" name="pro" placeholder="" style="visibility:hidden;">
            <div class="form-group">
              <label for="destination"><span class="glyphicon glyphicon-user"></span> Destination</label>
              <input type="text" class="form-control" id="id_destination" name="id_destination" placeholder="Enter la destination">
              <input disabled="disabled" type="text" class="form-control" id="id_destination_aff" name="id_destination_aff" placeholder="Enter la destination">
            </div>
            <div class="form-group">
              <label for="Lib_dest"><span class="glyphicon glyphicon-eye-open"></span> Libelle</label>
            <textarea class="form-control" rows="3" id="lib_destination" name="lib_destination" placeholder="entrer le libelle de la destination"></textarea> 
            </div>
            <div class="form-group">
              <label for="nature_projet"><span class="glyphicon glyphicon-eye-open"></span> Nature du projet</label>
          <select class="form-control" id="nature_projet" name="nature_projet">
             <option value="1">Nouveau (1)</option>
             <option value="2">En cours (2)</option>
             <option value="3">Resilié (3)</option>
          </select>
            </div>
            <div class="form-group">
              <label for="resp_projet"><span class="glyphicon glyphicon-eye-open"></span> Responsable du projet</label>
              <input type="text" class="form-control" id="resp_projet" name="resp_projet" placeholder="entrer le responsable du projet">
            </div>        
            <div class="form-group">
              <label for="date_destination"><span class="glyphicon glyphicon-eye-open"></span> Date de demarrage</label>
              <div class="input-group">
              <div class="input-group-addon">Date:</div>
              <input type="text" class="form-control" id="date_destination" name="date_destination" placeholder="entrer la date">
              <div class="input-group-addon">ex : 2016-12-30 (AAAA-MM-JJ)</div>
            
            </div>
            </div>
           <div class="form-group">
              <label for="dure_projet"><span class="glyphicon glyphicon-eye-open"></span> Durée du projet</label>
          <select class="form-control" id="dure_projet" name="dure_projet">
             <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
             <option value="4">4</option>
             <option value="5">5</option>
             <option value="6">6</option>
          </select>
            </div>
           <input type="submit" value="enregistrer" class="btn btn-warning" id="enr"/>
<input type="submit" value="editer" class="btn btn-warning" id="edi"/> <input type="reset"

 value="Annuler"> <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button> 
          </form>
        </div>
         <div id="formulaireresultat">
         
         </div>
         </div>
        <div class="modal-footer">
                              
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

  
    <!-- Custom Theme JavaScript -->
    <script src="menu/js/sb-admin-2.js"></script>
    <script  type="text/javascript" src="js/myscript.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->




</body>

</html>

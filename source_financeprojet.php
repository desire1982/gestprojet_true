

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
      <td><button  id="nouveau_financement"  class="btn btn-primary">FINANCEMENT</button></td>
  </tr>
</table>

                
  <?php 
include('/config/connectmysql.php'); 
   $sql_affiche="SELECT * FROM tbl_destination ORDER BY destination ASC";
  ?>              
                
      <div id="affiche_destination" >  
	 <table class="table table-striped table-condensed table-hover">
     <tr>
     <th width="300"> # </th>
     <th width="200"> code budgetaire </th>
     <th width="200"> libelle destination </th>
     <th width="200"> Nombre </th>
     <th width="50"> Details </th>
     </tr>
     
     <?php
	  $sql=mysql_query("$sql_affiche");
	  $item=0; 
	 if(mysql_num_rows($sql)>0){
		 while($donnee = mysql_fetch_array($sql)){ 
		 $nbreProjet=mysql_num_rows(mysql_query("SELECT * FROM tbl_finprjt WHERE code_destination_fk='".$donnee['destination']."'"));
		 $item=$item + 1;   
	   ?> 
 <tr> 
 <td><?php echo $item; ?> </td>     
<td><?php echo $donnee['destination']; ?> </td>
<td><?php echo $donnee['lib_destination']; ?></td>
<td><span class="badge"><?php echo $nbreProjet; ?></span></td>
<td><input type="button" class="btn btn-success" value="Detail" onclick="afficheDetail('<?php echo $donnee['destination']; ?>')"></td> 
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


<!--MODAL PARA MOSTRAR EL DETALLE -->
<div class="modal fade" id="detailSource" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
	   <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
	   <h4 class="modal-title" id="myModalLabel"> <b> FICHE DES SOURCES DE FINANCEMENT </b> </h4>
	  </div>
	  <div class="modal-body" id="resultSourceFinancement">
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
    <script  type="text/javascript" src="js/script_financement.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    


</body>

</html>

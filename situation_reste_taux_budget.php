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
    <link href="module/datatables/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
   <!-- <link href="module/datatables/css/dataTables.responsive.css" rel="stylesheet">-->

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
   <div class="row">
  <div class="col-lg-6">
  
  <h1 align="center"> FICHE DES RECHERCHES</h1>
  <p></p>
  
    <fieldset class="form-group">
    <label for="dotation">Dotation</label>
    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Chapitre:</span>
<input type="text" class="form-control " name="chapitre" id="chapitre"  disabled>
 </div>
<p></p>
 <div class="input-group"><span class="input-group-addon" id="basic-addon1">Sous chapitre:</span>
  <input type="text" class="form-control " name="Schapitre" id="Schapitre" disabled>
</div>
<p></p>
<div class="input-group"><span class="input-group-addon" id="basic-addon1">Region:</span>
  <input type="text" class="form-control " name="region" id="region" disabled>
</div>
   <input type="text" class="form-control " name="montant_v" id="montant_v">
<P></P>
<button  id="dotation"  class="btn btn-primary">Valider</button>
</fieldset>
  <!-- /.col-lg-6 -->
   </div>
  
    <div class="col-lg-6" >
    <h1 align="center"> FICHE DES RECHERCHES</h1>
  <div class="input-group"><span class="input-group-addon" id="basic-addon1">Selectionner le projet:</span>
 <?php 
//--------requete du menu destination pour afficher seulement les destinations qui ont été dotées par ordre croissant
$requete1="SELECT 
  `tbl_dotation_projet`.`destination_fk` AS destination,
  `tbl_destination`.`lib_destination` AS lib_destination
FROM
  `tbl_dotation_projet`
  LEFT OUTER JOIN `tbl_destination` ON (`tbl_dotation_projet`.`destination_fk` = `tbl_destination`.`destination`)
GROUP BY
  tbl_dotation_projet.destination_fk
ORDER BY
  `tbl_destination`.`lib_destination` ASC";
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

<div class="radio" style="text-align:center">
  <label class="radio-inline">
  <input type="radio" name="rech_notification" id="notif_credit" value="notif_credit">Taux par nature
</label>
<label class="radio-inline">
  <input type="radio" name="rech_notification" id="notif_credit" value="notif_arete"> Taux par destination
</label>
</div>
<P></P>
<!--  Ajout d'un champ caché de type notfication -->
<input type="hidden" class="form-control " name="type_notif" id="type_notif" disabled >

<!--Si l'Utilisateur est un visiteur on grise le bouton Valider-->
<?php if($role == 'visiteur') { ?>
<button disabled  id="visualiser"  class="btn btn-primary" style=" margin-right:10px">Visualiser</button>
 
 <a  target="_blank"  class="btn btn-success" onclick="reportPdf()">PDF</a>

<button  disabled  id="affich_pdf"  class="btn btn-primary">PDF</button>

<?php } ?>

 <!--Si l'Utilisateur est un admin ou projet on affiche le bouton Valider-->
<?php if($role == 'admin' || $role == 'projet' ) { ?>
<button  id="visualiser"  class="btn btn-primary" style=" margin-right:10px">Visualiser</button>
 
 <a target="_blank"  class="btn btn-success" onclick="reportPdf()">PDF</a>

<button   id="affich_pdf"  class="btn btn-primary">PDF</button>
<?php } ?>




<!-- /.col-lg-6 -->  
   </div>
  <!-- /.row -->  
 </div> 
 
 
  <!-- FORMULAIRE D'AJOUT DE MONTANT DOTATION PAR NATURE --> 
 

 
 <div id="detail">
 
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
    
     <!-- DataTables JavaScript -->
    <script src="module/datatables/js/jquery.dataTables.min.js"></script>
    <script src="module/datatables/js/dataTables.bootstrap.min.js"></script>
   <!-- <script src="module/datatables/js/dataTables.responsive.js"></script>-->

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    
<script type="text/javascript">
    $(document).ready(function () {
        
     $('#destination').on('click', function(){
		// On met les extractions dans des variables
	var chapitre = $('#destination').val().substr(0,3);
	var Schapitre = $('#destination').val().substr(3,4);
	var region = $('#destination').val().substr(7,2);
	//On affecte cela au zone de texte
	
	$('#chapitre').val(chapitre);
	$('#Schapitre').val(Schapitre);
	$('#region').val(region);
		 
	 });
	   
	//Conserver la valeur des boutons radios dans un champ caché pour exporter en pdf   
	   
	$('input[type=radio][name=rech_notification]').on('change', function() {
		
		var notif = $(this).val();
		$('#type_notif').val(notif);
		
		})
	
	
		
$('#visualiser').on('click', function(){	
var destination	= $('#destination').val();
var annee = $('#annee').val();
var notif_credit = $('input:radio:checked').val();


//console.log(destination+annee+notif_credit);
//alert(destination+annee+notif_credit);

if(notif_credit=='notif_credit'){


$.ajax({
	type:'POST',
	url:"php/rech_taux_budget.php",
	data:'destination='+destination+'&annee='+annee+'&notif_credit='+notif_credit,
	success: function(resultat){
	$('#detail').html(resultat);	
		}
})

// Fin de if
}
else if(notif_credit=='notif_arete'){
	
	//alert('notification réussi');
	
	$.ajax({
	type:'POST',
	url:"php/rech_notif_modif_budgetaire.php",
	data:'destination='+destination+'&annee='+annee+'&notif_credit='+notif_credit,
	success: function(resultat){
	$('#detail').html(resultat);	
		}
})
	

	
	}
		
});

		});

    //Fonction d'exportation en pdf

    function reportPdf(){
       var destination	= $('#destination').val();
        var annee = $('#annee').val();
		var types = $('#type_notif').val();

        window.open('/GestProjet/php/notification_pdf.php?destination='+destination+'&annee='+annee+'&types='+types);

    }

</script>



</body>

</html>

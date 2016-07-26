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
	
	
	
	// BOUTON RETOUR
	$('#retour').on('click', function(){
	location.href=document.URL;	
		})
	
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


// FONCTION DETAILLE DES FINANCEMENT

 function afficheDetail(dest){
	 
	 $.ajax({
		 type:'POST',
		 data:'dest='+dest,
		 url:"php/detailfinance.php",
		 success: function(data){
			 
			 $('#resultSourceFinancement').html(data);
			// alert('reussite');
			 $('#detailSource').modal({
				 
				 show:true,
				 backdrop:'static',
				 
		 });
	 
	 }

	 });
	 return false;
 }


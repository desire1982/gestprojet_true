 
  $(function(){
        
$('#nouveau_dest').on('click', function(){
	$('#form_destination')[0].reset();
	$('#pro').val('enregistrer');
	$('#enr').show();
	$('#edi').hide();
	$('#id_destination_aff').hide();
	$('#id_destination').show();
	
$('#fiche-destination').modal({
		show:true,
	    backdrop:'static'
		});	
});
});
// Fonction pour editer une destination
function editerDestination(id){
//$('#fiche-destination').reset();
$.ajax({
	type:'POST',
	url:"editer_destination.php",
	data:"id="+id,
	dataType:"json",
	success: function(valores){
	//	alert(valores.lib_dest);
		var info=eval(valores);
		
		$('#enr').hide();
	    $('#edi').show();
		$('#pro').val('editer');
		$('#id_destination_aff').show();
	    $('#id_destination').hide();
		$('#id_destination').css('color','blue');
		$('#id_destination').attr('readonly');
		$('#id_destination_aff').val(info.dest);
		$('#id_destination').val(info.dest);
		$('#lib_destination').val(info.lib_dest);
		
		//$('#lib_destination').val(valores.lib_dest);
		$('#fiche-destination').modal({
		show:true,
		backdrop:'static'
		});
		return false;
	}

});
}


function modifierDestination(){
	
	//$('#monForm').on('submit', function(e) {
  //      e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire
 
        // Je récupère les valeurs
        var id_destination = $('#id_destination').val();
        var lib_destination = $('#lib_destination').val();
		 var nature_projet = $('#nature_projet').val();
		 var resp_projet = $('#resp_projet').val();
		 var date_dem_projet = $('#date_dem_projet').val();
		 var dure_projet = $('#dure_projet').val();
		
		console.log(lib_destination+1);
 
        // Je vérifie une première fois pour ne pas lancer la requête HTTP
        // si je sais que mon PHP renverra une erreur
        if(id_destination === '' || lib_destination === '' || nature_projet === ''|| resp_projet === ''|| date_dem_projet === ''|| dure_projet === '') {
            alert('Les champs doivent êtres remplis');
			return false;
        } else {
            // Envoi de la requête HTTP en mode asynchrone
var url='php/modifier_destination.php';
$.ajax({
type:'POST',
url:url,
data:$('#form_destination').serialize(),
success: function(data){
if($('#pro').val()=='enregistrer'){
$('#form_destination')[0].reset();
//$('#formulaireresultat').addClass('bien').html('data completado con exito').show(1000).delay(2500).hide(200);
$('#affiche_destination').html(data);
//$("#affiche_destination").load("../destination_details.php");
$('#formulaireresultat').html('<div class="alert alert-success" role="alert">Enregistrement avec succès</div>').show(1000);

return false;
}
$('#affiche_destination').html(data);
$('#formulaireresultat').addClass('bienS').html('Edicion completado con exito').show(1000).delay(2500).hide(200);

console.log('Bien editer');
return false;
	}
          });
return false;

		}
		
		
		$('#fiche-destination').on('shown.bs.modal', function (event) {
  $('#id_destination').text('je');
  $('.date').datepicker({
            format: 'mm-dd-yyyy',
            startDate: '01/01/2010',
            endDate: '12/30/2020',
        })
  
})
		
		
		// Ajout du datepicker


}






function afficher(){
	alert(bienvenue);
	return false;
	}
	
	
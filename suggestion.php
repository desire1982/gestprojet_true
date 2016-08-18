<?php 

/* Test de la page de suggestion 
http://nehrugroup.in/2016/08/create-feedback-form-php-mysql-captcha/
*/
include('header_sug.php');
?>
<body>
<br><br>
 <div class="container">
<div class="row"> 
<div class="col-sm-8 col-sm-offset-3">
<h2>
	FORMULAIRE DE SUGGESTION
</h2> 

<form   method="POST" action="contact_query.php">
 <div class="row">

 <div class="form-group col-sm-6">
   
    
	<label for="full_name" class="h4" >Nom</label>
		<input type="text" title="" data-toggle="popover" data-trigger="hover" data-content="Veuillez saisir le nom d'utilisateur" data-placement="top"  class="form-control" name="full_name" id="full_name" placeholder="Entrer votre nom . . . ." autofocus required/>
		
	</div>
    
    <div class="form-group col-sm-3">	
	
	<label for="email" class="h4" >E-mail</label>
		<input type="email" title="" data-toggle="popover" data-trigger="hover" data-content="Veuillez saisir votre email pour recevoir un retour" data-placement="top" class="form-control" name="email" id="email" placeholder="Entrer votre Email . . . ." required/>
		
    </div>	
	
	<div class="form-group col-sm-9">
	<label for="message"  class="h4">Message</label>
		<textarea title="" data-toggle="popover" data-trigger="hover" data-content="Veuillez saisir le message de suggestion" data-placement="top" name="message" class="form-control" rows="5" placeholder="Entrer votre message . . . ." required></textarea>
		
	
	</div>
    
    <div class="form-group col-sm-5" >
		<input id="code" title="" data-toggle="popover" data-trigger="hover" data-content="Veuillez entrer le code en face" data-placement="top" class="form-control" name="code_confirmation" type="text" placeholder="Entrez le code en face . . . ." required></td>
</div>
<br>
<div class="form-group col-sm-5">

	
	<img src="generatecaptcha.php?rand=<?php echo rand(); ?>" name="captcha_img" id='image_captcha' class="form-control" > 
	<a href='javascript: refreshing_Captcha();'><i class="icon-refresh icon-large"></i></a> 
	<script language='JavaScript' type='text/javascript'>
		function refreshing_Captcha()
		{
			var img = document.images['image_captcha'];
			img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
		}
	</script>
	
</div>
 
<br />
<br />
 

<div class="form-group col-sm-5" style="margin-left:180px;">
	
		<button type="submit" name="send_message" class="btn btn-success"><i class="icon-ok icon-large"></i> Envoyer</button> &nbsp; <button type="text" name="retour" class="btn btn-success"><i class="icon-ok icon-large"></i> Retour</button>
	
</div>
 </div>
  <!-- Fin de row de Form-->
</form>

 </div>
 <!-- Fin de  col-sm-9 col-sm-offset-3 -->
 </div>
 <!-- Fin de row -->
 </div>

 <!-- Fin de container -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
</body>
</html>
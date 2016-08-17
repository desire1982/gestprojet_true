<?php 

/* Test de la page de suggestion 
http://nehrugroup.in/2016/08/create-feedback-form-php-mysql-captcha/
*/
include('header_sug.php');
?>
<body>
<br><br>
 
<form class="form-horizontal" style="margin-left:360px;" method="POST" action="contact_query.php">
<h2>
	FORMULAIRE DE SUGGESTION
</h2>
	<p class="full_name">
	<label for="full_name" style="font-size:18px; font-family:georgia; margin-top:10px;">Nom</label>
		<input type="text" name="full_name" id="full_name" placeholder="Entrer votre nom . . . ." autofocus required/>
		
	</p>
		
	<p class="email">
	<label for="email" style="font-size:18px; font-family:georgia margin-top:10px;">E-mail</label>
		<input type="email" name="email" id="email" placeholder="Entrer votre Email . . . ." required/>
		
	</p>	
	
	<p class="message">
	<label for="message" style="font-size:18px; font-family:georgia margin-top:10px;">Message</label>
		<textarea name="message" placeholder="Entrer votre message . . . ." required></textarea>
		
	</p>
	
<div class="control-group" style="float:left; margin-left:180px;">
	<div class="controls">
	
	<img src="generatecaptcha.php?rand=<?php echo rand(); ?>" name="captcha_img" id='image_captcha' > 
	<a href='javascript: refreshing_Captcha();'><i class="icon-refresh icon-large"></i></a> 
	<script language='JavaScript' type='text/javascript'>
		function refreshing_Captcha()
		{
			var img = document.images['image_captcha'];
			img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
		}
	</script>
	</div>
</div>
 
<br />
<br />
<br />
 
<div class="control-group" style="margin-left:180px;">
	<div class="controls">
		<input id="code" name="code_confirmation" type="text" placeholder="Entrez le code ci-dessus . . . ." required></td>
	</div>
</div>
<br>
<div class="control-group" style="margin-left:180px;">
	<div class="controls">
		<button type="submit" name="send_message" class="btn btn-success"><i class="icon-ok icon-large"></i> Envoyer</button> &nbsp; <button type="text" name="retour" class="btn btn-success"><i class="icon-ok icon-large"></i> Retour</button>
	</div>
</div>
 
</form>
 
</body>
</html>
<?php
  $msg="";
include('config/connect.php');
// si le bouton a été soumis
if(isset($_POST['login_btn'])){
	if(!isset($_POST['username'])||$_POST['username']== ""){
		$msg="Veuillez renseigné le nom d'utilisateur";
			
		}elseif(!isset($_POST['password'])|| $_POST['password']== ""){
		
		$msg="Veuillez renseignez le mot de passe";	
			
			}else{
	
	$username=$_POST['username'];
    $password=$_POST['password'];
	$ip=$_SERVER["REMOTE_ADDR"];
	$date_connexion = date('Y-m-d H:i:s');
	//var_dump($date_connexion,$ip);
  
  $sql="SELECT * FROM tbl_user where username='$username' and password='$password'";
 //Execute la requete
  $res = $mysqli->query("$sql");
  
 
  $row = $res->fetch_assoc();

//On verifie si l'utilisateur existe et s'il est déjà connecté

	
  $id_utilisateur = $row['id_user'];
  $name = $row['user_name'];
  $user = $row['username'];
  $pass = $row['password'];
  $type = $row['statut'];
  $date_creation = $row['date_creation'];
   $etat_connecte=$row['connecte'];
  
  //Si le nom d'utilisateur et le mot de passe sont correctent
  if($user==$username && $pass=$password){
	  
	 // Si l'utilisateur n'est pas encore connecté
	 
	 if($etat_connecte =='0'){ 
	  
    session_start();
	
	// On insère la date de la connextion et l'adresse ip du poste connecter
	//$sql_insert = "";
	$stmt = $mysqli->prepare("UPDATE tbl_user SET date_dernier_connexion = ?, adresse_ip = ?, connecte = ? WHERE id_user = ?");
   
    $stmt->bind_param('ssss', $nm, $gd, $tl, $id_users);
 
          $nm = $date_connexion;
          $gd = $ip;
          $tl = '1';
		  $id_users = $id_utilisateur ;
         
	if($stmt->execute()){
               
		  }else{
               echo "<script>alert('".$stmt->error."')</script>";
			   exit;
		  }
	// Fin de l'ajout connection
	
	//si c'est l'admin ou le visiteur
    if($type=="admin" OR $type=="visiteur" ){
		//On recupère le nom d'utilisateur et le type dans des vaviables sessions
      $_SESSION['nom_utilisateur']=$name;
      $_SESSION['role']=$type;
	  //On recupère l'id de l'utilisateur pour mettre à 0 le champ connecté en cas de deconnection
	  $_SESSION['id_user_ss']=$id_utilisateur;
	 
      echo "<script>window.location.assign('acceuil.php')</script>";
    } else if($type=="projet"){
      $_SESSION['nom_utilisateur']=$name;
      $_SESSION['role']=$type;
	  //On recupère l'id de l'utilisateur pour mettre à 0 le champ connecté en cas de deconnection
	  $_SESSION['id_user_ss']=$id_utilisateur;
      echo "<script>window.location.assign('acceuil.php')</script>";
    } else{
?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong>Le</strong> Type d'utilisateur n'existe pas.
</div>
<?php
    }// Fin if type
  }
else{
	
?>

<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong>Cet utilisateur est déjà</strong> connecté.
</div>
<?php

	  	  
	  
  }// Fin if connecté
  
			}else{ 
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong>Attention??</strong> Ce nom ou mot de passe n'existe pas.
</div>
<?php
  }
 // Fin if existe dans la base $user==$username && $pass=$password
  }
  // Fin if renseigné dans le formulaire
}

// Fin if soumis dans le formulaire
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion Projet</title>
 
    <!-- Bootstrap -->
    <link href="module/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
   
    
    
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
        <style>
    
    .center_div{	
/* Centrer le formulaire horizontalement et verticalement */	
	position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
}

.center_panel{
	/* Mettre la couleur du cadre */
	background-color:#0C9;

	
	}


body{
	/* Couleur d'arriere plan de la page */
	/*background-color:#CCC;*/
	background-image:url(images/arr_connex.jpg);

	}
    
    </style>
  </head>
  <body>
  
  <div class="container ">
   <div class="row center_div">
    
    <div class="col-lg-12 ">
 <marquee direction="left" behavior="alternate" style="color:#C30">Le site Web sera bientôt ouvert au public</marquee>
   
    <div class="panel panel-default center_panel " >

      <div class="panel-body ">
     
    <h2 align="center" style="color:#030">Bienvenue sur l'intranet de la DAF</h2>
    <hr>
    <div class="msgerror"><?php if(isset($msg)) echo $msg  ?>  </div>
    <form role="form" method="post" class="col-lg-6" action="index.php">
      <div class="form-group">
 <label for="username" style="color:#060">Nom utilisateur</label>
 <div class="input-group input-group-sm">
 <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
 <input type="text" class="form-control" id="username" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']  ?>">
      </div>
      </div>
      <div class="form-group">
 <label for="password" style="color:#060">Mot de passe</label>
 <div class="input-group input-group-sm">
 <div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>
 <input type="password" class="form-control" id="password" name="password">
      </div>
      </div>
      
      <div class="form-group">
 
 
 <label for="type" style="color:#060">Type</label>
 <select name="type" id="type" class="form-control" >
 <?php $res_menu = $mysqli->query("SELECT statut FROM tbl_user GROUP BY statut");
while ($row_menu = $res_menu->fetch_assoc()){ ?>
 <option value="<?php echo $row_menu['statut']; ?> ">
 <?php echo $row_menu['statut']; ?> </option>
 
 <?php } ?>
 
 </select> 
 </label>
 
      </div>
      
      <button type="submit" name="login_btn" class="btn btn-primary" style="width:100px">Login</button><br>
     <p></p>
<a href="#"> mot de passe oublié</a> <span> | </span><a href="#"> Suggestion</a>
    </form>

     <div class="col-lg-6"><img src="images/logo_daf.png" alt="..." class="img-thumbnail" width="200"></div>  

 
      </div>
     </div>
     </div>
     <!-- Fin col-lg-8 -->
     <div class="col-lg-4">
     
    
     </div>
     
     </div>
     <!-- Fin row -->
  </div>
  <!-- Fin container -->
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="module/jquery/jquery.min.js" ></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="module/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html> 

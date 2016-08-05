<?php
  $msg="";
include('config/connect.php');

if(isset($_POST['login_btn'])){
	if(!isset($_POST['username'])||$_POST['username']== ""){
		$msg="Veuillez renseigné le nom d'utilisateur";
			
		}elseif(!isset($_POST['password'])|| $_POST['password']== ""){
		
		$msg="Veuillez renseignez le mot de passe";	
			
			}else{
	
	$username=$_POST['username'];
    $password=$_POST['password'];
  
  $sql="SELECT * FROM tbl_user where username='$username' and password='$password'";
 
  $res = $mysqli->query("$sql");
  
 
  $row = $res->fetch_assoc();


  $name = $row['user_name'];
  $user = $row['username'];
  $pass = $row['password'];
  $type = $row['statut'];
  $date_creation = $row['date_creation'];
  if($user==$username && $pass=$password){
    session_start();
    if($type=="admin" OR $type=="visiteur" ){
      $_SESSION['nom_utilisateur']=$name;
      $_SESSION['role']=$type;
	 
      echo "<script>window.location.assign('acceuil.php')</script>";
    } else if($type=="projet"){
      $_SESSION['nom_utilisateur']=$name;
      $_SESSION['role']=$type;
      echo "<script>window.location.assign('acceuil.php')</script>";
    } else{
?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong>Maaf!</strong> Tidak sesuai dengan type user.
</div>
<?php
    }
  }else{ 
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong>Attention??</strong> Ce nom ou mot de passe n'existe pas.
</div>
<?php
  }}
}
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
   /* margin: 0 auto;
    width:80%; /* value of your choice which suits your alignment */
	/*background-color:#033;*/
	
}
    
    </style>
  </head>
  <body>
  <p>
</p>
  <div class="container center_div">
   <div class="row">
    
    <div class="col-lg-8">
 <marquee direction="left" behavior="alternate" style="color:#C30">Le site Web sera bientôt ouvert au public</marquee>
   
    <div class="panel panel-default center_div" >

      <div class="panel-body center_body">
     
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

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
    <title>Login Session</title>
 
    <!-- Bootstrap -->
    <link href="module/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
   
    
    
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<style>

body {
    padding-top: 90px;
	background-color:#060
}
.panel-login {
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	background-color:#C60
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #029f5b;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #53A3CD;
	border-color: #53A3CD;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #1CA347;
	border-color: #1CA347;
}


    
    .center_div{
    margin: 0 auto;
    width:70%;
	padding-left: 40px;
	padding-right:40px;
	 margin-left:auto;
	 margin-right:auto;
	 border: 2px solid rgba(187, 138, 138, 1);
	 background-color: rgba(187, 138, 138, 1);
	 
	 /*background-color:#06F;*/
	
	 /* value of your choice which suits your alignment */
	/*background-color:#033;*/
	
}


.center_body{
	width:75%;
	background-color:#FFF;
    
	
	
	}
    
    </style>
    
    
    
    
    
    
    
  </head>
  <body>
  <p>
</p>
  
  
 <div class="container">
    	<div class="row">
        
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
            <img  src="images/logo_daf_mie.jpg" width="100px" alt=""  style="text-align:center; padding:14px 0;">
            </div>
            </div>
			<div class="col-md-6 col-md-offset-3">
            
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                             
								<form id="login-form" action="index.php" method="post" role="form" style="display: block;">
                                <div class="msgerror"><?php if(isset($msg)) echo $msg  ?>  </div>
									<div class="form-group">
				<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
				<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
                                    
                           <div class="form-group">         
                                    <select name="type" id="type" class="form-control" >
 <?php $res_menu = $mysqli->query("SELECT statut FROM tbl_user GROUP BY statut");
while ($row_menu = $res_menu->fetch_assoc()){ ?>
 <option value="<?php echo $row_menu['statut']; ?> ">
 <?php echo $row_menu['statut']; ?> </option>
 
 <?php } ?>
 
 </select> 
                     </div>               
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
		<input type="submit" name="login_btn" id="login_btn" tabindex="4" class="form-control btn btn-login" value="Login">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
		<a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
                                
    <!--   Formulaire d'enregistrement -->
                                
	<form id="register-form" action="" method="post" role="form" style="display: none;">
									<div class="form-group">
<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  
  
  <!--     
  
  
  
  <div class="container center_div">
   
 
   
    <div class="panel panel-default center_div" >
      <div class="panel-body center_body">
     
    <h2>Bienvenue</h2>
    <div class="msgerror"><?php if(isset($msg)) echo $msg  ?>  </div>
    <form role="form" method="post" class="col-lg-8" action="index.php">
      <div class="form-group">
 <label for="username">Nom utilisateur</label>
 <div class="input-group input-group-sm">
 <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
 <input type="text" class="form-control" id="username" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']  ?>">
      </div>
      </div>
      <div class="form-group">
 <label for="password">Mot de passe</label>
 <div class="input-group input-group-sm">
 <div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>
 <input type="password" class="form-control" id="password" name="password">
      </div>
      </div>
      
      <div class="form-group">
 
 
 <label for="type">Type</label>
 <select name="type" id="type" class="form-control" >
 <?php $res_menu = $mysqli->query("SELECT statut FROM tbl_user GROUP BY statut");
while ($row_menu = $res_menu->fetch_assoc()){ ?>
 <option value="<?php echo $row_menu['statut']; ?> ">
 <?php echo $row_menu['statut']; ?> </option>
 
 <?php } ?>
 
 </select> 
 </label>
 
      </div>
      
      <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
    </form>
       
      </div>
     </div>
     
  </div>
  
  
  -->
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="module/jquery/jquery.min.js" ></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="module/bootstrap/js/bootstrap.min.js"></script>
    
    <script>
	$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});
	
	</script>
    
  </body>
</html> 

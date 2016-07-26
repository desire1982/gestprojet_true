<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GESTION DES PROJETS</title>

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


<?php
include('/config/connect.php'); 
//$msg='';
	// Verifie si la destination existe  
  $sql_affiche="SELECT * FROM tbl_destination ORDER BY destination ASC ";
	  
//	  $res=$mysqli->query("$sql_verif");
//	  $count=$res->num_rows;
	?>
     
     
	 <table class="table table-striped table-condensed table-hover">
     <tr>
     <th width="300"> destination </th>
     <th width="200"> libellee destination </th>
     <th width="50"> option </th>
     </tr>
     
     <?php
	  $res_affiche=$mysqli->query("$sql_affiche"); 
	   $row = $res_affiche->fetch_assoc();  
	   
	   while($row = $res_affiche->fetch_assoc()){
	   
	   ?> 
       
<td><?php echo $row['destination']; ?> </td>
<td><?php echo $row['lib_destination']; ?></td>
<td><a href="javascript:editerDestination('<?php echo $row['destination']; ?>');" class="glyphicon glyphicon-edit"></a><a href="javascript:eliminerDestination('<?php echo $row['destination']; ?>')" class="glyphicon glyphicon-remove-circle"></a></td> 
</tr>

   <?php 
	   }
	   ?>
      
</table>
	 
 <!-- jQuery -->
    <script src="module/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="module/bootstrap/js/bootstrap.min.js"></script>
    </body>

</html>
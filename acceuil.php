<?php
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
                <div class="col-lg-12">
                    <h1 class="page-header">TABLEAU DE BORD - BUDGET <?php  echo time(); ?> </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
<!--
Code à inserer


-->
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                        <!-- DEBUT DE GRAPHIQUE -->
                            <div id="container" style="width:100%; height:300px"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="module/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="module/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="menu/js/metisMenu.min.js"></script>

    
    
    <!-- Custom Theme JavaScript -->
    <script src="menu/js/sb-admin-2.js"></script>
  
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Fruit Consumption'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Jane',
            data: [1, 0, 4]
        }, {
            name: 'John',
            data: [5, 7, 3]
        }]
    });
});
    </script>

</body>

</html>

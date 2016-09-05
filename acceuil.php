
<?php 
include('config/connectmysql.php');
include('deconnect_auto.php');
 //--------requete des dotations de 2016
$reqdotation="SELECT 
  `tbl_dotation_projet`.`date_dotation` AS annee,
  SUM(`tbl_dotation_projet`.`montant_dotation`) AS `montant_globaux`
FROM
  `tbl_dotation_projet`
WHERE
  `tbl_dotation_projet`.`date_dotation` = 2016
GROUP BY
  `tbl_dotation_projet`.`date_dotation`";
  
//  var_dump($requete1);
$resdotation=mysql_query($reqdotation);
//var_dump($resultat1);
$Totaldotation= mysql_fetch_array($resdotation);
$TotauxDotations= $Totaldotation['montant_globaux'];
$TotauxAnnee = $Totaldotation['annee'];

// requete des modifications de 2016
$reqmodification ="SELECT 
  YEAR(`date_sign_mb`) AS `annee_mod`,
  SUM(`tbl_modif_budget`.`montant_mb`) AS `montant_modif`
FROM
  `tbl_modif_budget`
WHERE
  YEAR(`date_sign_mb`) = 2016
GROUP BY
  YEAR(`date_sign_mb`) ";
$resmodification=mysql_query($reqmodification);
//var_dump($resultat1);
$Totalmodification= mysql_fetch_array($resmodification);
$TotauxModifications= $Totalmodification['montant_modif'];
$TotauxAnnee_modif = $Totalmodification['annee_mod'];




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
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
 
 <script type="text/javascript">
		$(document).ready(function() {
			var options = {
	            chart: {
	                renderTo: 'container',
	                type: 'column',
	                marginRight: 130,
	                marginBottom: 25
	            },
	            title: {
	                text: 'DOTATION',
	                x: -20 //center
	            },
	            subtitle: {
	                text: '',
	                x: -20
	            },
	            xAxis: {
	                categories: []
	            },
	            yAxis: {
	                title: {
	                    text: 'MONTANT'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 1,
	                    color: '#808080'
	                }]
	            },
	            tooltip: {
	                formatter: function() {
						// Mise en place du format du graphique
	                        return '<b>'+ this.series.name +'</b><br/>'+
	                        this.x +': '+ Highcharts.numberFormat(this.y, 0);
	                }
	            },
	            legend: {
	                layout: 'vertical',
	                align: 'right',
	                verticalAlign: 'top',
	                x: -10,
	                y: 100,
	                borderWidth: 0
	            },
	            series: []
	        }
	        
	        $.getJSON("data_dotation_source_finance.php", function(json) {
				options.xAxis.categories = json[0]['data'];
	        	options.series[0] = json[1];
	        	options.series[1] = json[2];
	        	options.series[2] = json[3];
		        chart = new Highcharts.Chart(options);
	        });
	    });
		</script>
        
        
  <!--Camembers -->      
        <script type="text/javascript">
$(document).ready(function() {
	
//Reglage des options du graphique
var options = {
    chart: {
        renderTo: 'containerCamember',
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false
    },
    title: {
        text: 'SOURCE DE FINANCEMENT'
    },
    tooltip: {
        formatter: function() {
			// le chiffre sur les infobulles est en pourcentage
            return '<b>'+ this.point.name +'</b>: '+ this.percentage.toFixed(2) +' %';
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
			 //borderColor: '#000000',
			// borderWidth: 3,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                color: '#000000',
                connectorColor: '#000000',
                formatter: function() {
					// Formatter le nombre en separateur de millier
                    return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.y, 0) +' F CFA';
                }
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Browser share',
        data: []
    }]
}


// Remplissage du graphique avec les données JSON


$.getJSON("data_dotation_source_finance_camember.php", function(json) {
                options.series[0].data = json;
                
				
				chart = new Highcharts.Chart(options);
            });
	
});
</script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
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
            
            <!-- Page d'acceuil -->
            <?php if($role == 'admin' || $role == '2' ) { ?>
            <div class="row">
            
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-comments fa-1x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" style="font-size:16px; font-weight:bold; color:#000"><?php echo number_format($TotauxDotations, 0, ',', ' '); ?></div>
                                    <div style="font-weight:bold">DOTATION <?php echo $TotauxAnnee; ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
               <?php } ?> 
                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-1x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" style="font-size:16px; font-weight:bold; color:#000"><?php echo number_format($TotauxModifications, 0, ',', ' '); ?> </div>
                                    <div style="font-weight:bold">MODIFICATION <?php echo $TotauxAnnee_modif; ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-1x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" style="font-size:16px; font-weight:bold; color:#000">124</div>
                                    <div>Dossiers traités</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-1x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" style="font-size:16px; font-weight:bold; color:#000">13</div>
                                    <div>Support Tickets!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Graphique camember
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

                            <div id="container"> </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                   </div>
                   <!-- /.col-lg-8 -->
                   
                   
              <!-- Deuxième panel -->      
                    
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Graphique Camember
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
                            <div id="containerCamember"> </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                   </div> 
                   <!-- /.col-lg-8 --> 
                   
                   </div>
                   <!-- /.row --> 
                   
                   </div>
                   <!-- /.row --> 
            

                        
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

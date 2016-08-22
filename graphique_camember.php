<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Graphique camember</title>

<!--  Mise en place d'un graphique circulaire avec highchart, php, json et mysql  -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	
//Reglage des options du graphique
var options = {
    chart: {
        renderTo: 'container',
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false
    },
    title: {
        text: 'Web Sales & Marketing Efforts'
    },
    tooltip: {
        formatter: function() {
            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                color: '#000000',
                connectorColor: '#000000',
                formatter: function() {
                    return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
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


$.getJSON("data_highchart.php", function(json) {
                options.series[0].data = json;
                
				
				chart = new Highcharts.Chart(options);
            });
	
});
</script>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
</head>

<body>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
</body>
</html>
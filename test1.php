<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>amCharts examples</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
		<script type="text/javascript" src="http://www.amcharts.com/lib/3/pie.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script type="text/javascript">
            var chart;
            var legend;
			;
			/*$.getJSON("getJSONdata.php?province=Ontario", function(data){				
				chartData = data;
				console.log(chartData);
			});*/
			var chartData =(function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': "getJSONdata.php?province=Ontario",
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
})(); 
            /*var chartData = 
                [{"Age Group":"0 to 14","Value":"2190.30"},{"Age Group":"15 to 64","Value":"9351.30"},{"Age Group":"65 and older","Value":"2137.10"}];*/
			
            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartData;
                chart.titleField = "Age Group";
                chart.valueField = "Value";
                chart.outlineColor = "#FFFFFF";
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // this makes the chart 3D
                chart.depth3D = 15;
                chart.angle = 30;

                // WRITE
                chart.write("chartdiv");
            });
        </script>
    </head>
    
    <body>
        <div id="chartdiv" style="width: 50%; height: 200px;"></div>
    </body>

</html>
<?php

include 'connection.php';
connect();

if(isset($_POST['province'])){
	$province = $_POST["province"];
	$query="SELECT * FROM population where p_id = '".$province."'";
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	else{
		$array = array();
		while ($row = mysql_fetch_assoc($result)) {
			$tmpArray = array(
				'Age Group' => $row['agegroup'],
				'Value' => $row['value']
			);
			array_push($array,$tmpArray);
			/* echo "Age group: ".$row['agegroup'].'<br>';
			echo "Value: ".$row['value'].'<br>'; */
		}
		$var1 = json_encode($array);
	}
	$industry = $_POST["sector"];
	$query="SELECT * FROM gdp1 where sector_id = $industry";
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	else{
		$array = array();
		while ($row = mysql_fetch_assoc($result)) {
			$tmpArray = array(
				'Year' => $row['year'],
				'Value' => $row['value']
			);
			array_push($array,$tmpArray);
			/* echo "Age group: ".$row['agegroup'].'<br>';
			echo "Value: ".$row['value'].'<br>'; */
		}
		$var2_gdp = json_encode($array);
		
		
	}
	$query="SELECT MAX(value), MIN(value) FROM gdp1 where sector_id = $industry group by sector_id";
	$result = mysql_query($query);
	$maxValue = "";
	$minValue = "";
	while ($row = mysql_fetch_assoc($result)) {
			// print_r($row);
			// exit();
			$maxValue = $row['MAX(value)'];
			$minValue = $row['MIN(value)'];
		}
}
// print_r($_POST);
function get_city_details(){
	if(isset($_POST) and isset($_POST['province'])){
		$query = "SELECT p_id, code, name FROM city where p_id=";
		$result = mysql_query($query) or die(mysql_error()."[".$query."]");
	}
}

function good_average_bad(){
	if(isset($_POST) and isset($_POST['province'])){
		// $query = "SELECT max(`totalemp`), min(`totalemp`), (select `totalemp` FROM `totalemployed` where `sector_id`= 1 and `p_id` = 4) FROM `totalemployed`;"
		$query="set @x=0;
				SELECT p_id, @x:=@x+1 as rank FROM `totalemployed` WHERE sector_id=".$_POST['sector']." order by totalemp desc";
		$result = mysql_query($query) or die(mysql_error()."[".$query."]");
		$result= mysql_result($result);
	}
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>HeartOfCODE</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="style.css" type="text/css">
        <script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
		<script type="text/javascript" src="http://www.amcharts.com/lib/3/pie.js"></script>
		 <script src="amcharts/serial.js" type="text/javascript"></script>
        <script src="amcharts/themes/dark.js" type="text/javascript"></script>
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script type="text/javascript">
            var chart;
            var legend;
			;
			/*$.getJSON("getJSONdata.php?province=Ontario", function(data){				
				chartData = data;
				console.log(chartData);
			});*/
			/*var chartData =(function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': "getJSONdata.php?province=Quebec",
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
})(); */
            /*var chartData = 
                [{"Age Group":"0 to 14","Value":"2190.30"},{"Age Group":"15 to 64","Value":"9351.30"},{"Age Group":"65 and older","Value":"2137.10"}];*/

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = <?php echo $var1 ?>;
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
		
		<script>
			 var chart = AmCharts.makeChart("chartdiv1", {
                "type": "serial",
                "theme": "light",
                "pathToImages": "../amcharts/images/",
                "dataProvider": <?php echo $var2_gdp ?>,
				"valueAxes": [{
                    "maximum": <?php echo $maxValue+500 ?>,
                    "minimum": <?php echo $minValue-500 ?>,
                    "axisAlpha": 0,
                    "guides": [{
                        "fillAlpha": 0.1,
                        "fillColor": "#CC0000",
                        "lineAlpha": 0,
                        "toValue": 120,
                        "value": 0
                    }, {
                        "fillAlpha": 0.1,
                        "fillColor": "#0000cc",
                        "lineAlpha": 0,
                        "toValue": 200,
                        "value": 120
                    }]
                }],
                "graphs": [{
                    "bullet": "round",
                    "dashLength": 4,
                    "valueField": "Value"
                }],
                "chartCursor": {
                    "cursorAlpha": 0
                },
                "categoryField": "Year",
                "categoryAxis": {
                    "parseDates": false
                }
            });
		
		
		</script>
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.onvisible.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/b_init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/business_style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>



<script>
$(document).ready(function(){
    $(".button").click(function(){
		var val='#div-'+$(this).val();
        $(val).fadeToggle("slow");
    });
});
</script>
	<body class="homepage">
		<h2 style="text-align: center;"><a href="index.php">Listed out according to the major cities.</a></h2>
		<!-- Banner -->
					
			<div>
				<div id="banner" style="float:left;">
						<article id="main" class="container special" style="width: 300px;float: left;margin-left: 30px;margin-right: 30px;">
							<form id="business-form" method="POST">
								<h2><a href="#">Filter</a></h2>
								<label for="province">Province</label>
								<select id="province" name="province">
									<option id="default" name="default" value="0">All</option>
									<?php 
										$query = "SELECT p_id, name FROM province";
										$result = mysql_query($query) or die(mysql_error()."[".$query."]");
										$code="";
										if(isset($_POST) and isset($_POST['province'])){ 
											$code=$_POST['province'];
										} 
										while ($row = mysql_fetch_array($result))
										{
											$sel="";
											if($code==$row['p_id']){ 
												$sel="selected";
											}
											echo "<option value='".$row['p_id']."' ".$sel." >".$row['name']."</option>";
										}
									?> 
								</select>
								<label for="sector">Industry</label>
								<select id="sector" name="sector">
									<?php 
										$query = "SELECT sector_id, name FROM sector";
										$result = mysql_query($query) or die(mysql_error()."[".$query."]");
										$code="";
										if(isset($_POST) and isset($_POST['sector'])){ 
											$code=$_POST['sector'];
										} 
										while ($row = mysql_fetch_array($result))
										{
											$sel="";
											if($code==$row['sector_id']){ 
												$sel="selected";
											}
											echo "<option value='".$row['sector_id']."' ".$sel." >".$row['name']."</option>";
										}
									?> 
								</select>
								
								<?php 
									$value="";
									if(isset($_POST) and isset($_POST['capital'])){ 
										$value=$_POST['capital'];
									} 
								?>
								<label for="capital">Initial Capital</label>
								<select id="capital" name="capital">
									<option id="default" name="default" value="0" >--select--</option>
									<option value="1" <?php if($value==1){echo "selected";} ?> >1000 < 10000</option>
									<option value="2" <?php if($value==2){echo "selected";} ?>>10000 - 50000</option>
									<option value="3" <?php if($value==3){echo "selected";} ?>>> 50000</option> 
								</select>
								<label for="labour">No of Labour
									<input type="text" id="labour" name="labour" value="<?php if(isset($_POST) and isset($_POST['labour'])) { echo $_POST['labour'];} ?>">
								</label>
								
								
								<footer>
									<input type="submit" class="button" value="Go">
								</footer>
								
							</form>

						</article>

				</div>

				<!-- Features -->
				<div id="features" class="" style="margin-left: 360px;">
					<?php
						if(isset($_POST) and isset($_POST['province']) and $_POST['province']!=0){
							echo "<span><b>Population by age group</b><span>";
							echo "<div id='chartdiv' style='width: 50%; height: 200px;'></div>";
							$query="SELECT name FROM sector where sector_id = ".$_POST["sector"].";";
							$result = mysql_query($query);
							$name ="";
							while ($row = mysql_fetch_assoc($result)) {
								$name = $row['name'];
							}
							echo "<span><b>GDP for ".$name."</b><span>";
							echo "<div id='chartdiv1' style='width: 80%; height: 200px;'></div>";
						}
					?>
					
					<?php
						if(isset($_POST) and isset($_POST['province']) and $_POST['province']!=0){
							echo "<div id='provdiv' style='width: 50%; height: 50px;'>";
							// $query="SELECT name FROM sector where sector_id = ".$_POST["sector"].";";
							$query="SELECT t.p_id as pr_id, (select p.name from province p where p.p_id=t.p_id) as rank, totalemp 
									FROM totalemployed t 
									WHERE sector_id=".$_POST['sector']." order by totalemp desc";
							$result = mysql_query($query);
							 // echo $query;
							// echo "<table>";
							// echo "<tr><th>Rank</th><th>Name</th><th>Employee availability(x1000)</th></tr>";
							$i=0;
							while ($row = mysql_fetch_array($result)) {
								$i=$i+1;
								// echo "<tr><td>".$i."</td><td>".$row["rank"]."</td><td>".$row["totalemp"]."</td></tr>";
								// print_r($row);
								
								if($row["pr_id"]==$_POST['province']){
									if($i<4){
										echo "<b>Indury Rating :- </b><span style='color:green;margin-left: 10px;font-weight: bold;font-size: 32px;'>Good</span>";
									}elseif ($i<7){
										echo "<b>Indury Rating :- </b><span style='color:blue;margin-left: 10px;font-weight: bold;font-size: 32px;'>Average</span>";
									}else {
										echo "<b>Indury Rating :- </b><span style='color:red;margin-left: 10px;font-weight: bold;font-size: 32px;'>Bad</span>";
									}
								}
							}
							// echo "</table>";
							echo "</div>";
						}
					?>
					
					<?php 
					if(isset($_POST) and isset($_POST['province'])){
						$query="select c.c_id, c.cityname, p.p_id, p.name, wages, totalemp 
							from weeklywages w 
							left join totalemployed e on w.sector_id = e.sector_id 
							left join province p on p.p_id = e.p_id 
							left join city c on c.p_id = p.p_id 
							where w.sector_id = '".$_POST['sector']."'";
						$where="";
						if($_POST['province']!=0){
							$where=" and p.p_id='".$_POST['province']."'";
						}
						$query = $query.$where.";";
						$result = mysql_query($query) or die(mysql_error()."[".$query."]");
					}
					$code="";
					while ($row = mysql_fetch_array($result))
					{?>
						<h3>
							<button class="button" style="padding:1.65em 40.5em 1.65em 40.5em;width:100%" value="<?php echo $row['c_id']; ?>" id="<?php echo $row['c_id']; ?>" >
								<?php echo $row['cityname']; ?>
							</button>
						</h3>
						<div class="row fade" id="div-<?php echo $row['c_id']; ?>" style="display:none;padding: 0px 100px 100px 100px;background: aquamarine;margin: 0px 0 0px 0px;">
							<p>
								<p>
									<b>Province : <?php echo $row['name'];?></b> 
								</p>
								<p>
									<b>Average daily wages : <?php echo "$ ".round(($row['wages']/7), 2);?></b> 
								</p>
								<p>
									<b>Total employees (x1000) : <?php echo $row['totalemp'];?></b> 
								</p>
							</p>
							<p>
								<?php echo $row['cityname']." is a city in ".$row['name']." where the average weekly income is ".$row['wages']." and the total 
								number of employees are ".($row['totalemp']*1000)."."; ?>
							</p>
						</div>
						<p style="background: white;"></p>
					<?php }?>
				</div>
			</div>

	</body>
</html>
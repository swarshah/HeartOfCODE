<?php
function connect(){
	$link = mysql_connect('localhost', 'root', '');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db('code', $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}
	return $link;
}

function close_db(){
	mysql_close($link);
}
connect();

if(isset($_POST['province'])){
	$province = $_POST["province"];
	$query="SELECT * FROM population where p_id = (SELECT p_id from province where name = '$province');";
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
}
// print_r($_POST);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>CODE-EDOC</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
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
/*$(document).ready(function(){
    $(".butn").click(function(this){
        $("this").fadeToggle("slow");
    });
});*/
</script>
	<body class="homepage">
		<h2 style="text-align: center;margin-top: 15px;margin-bottom: 50px;"><a href="#">Listed out according to the major cities.</a></h2>
		<!-- Banner -->
			<div>
				<div id="banner" style="float:left;background-color:#2b252c;">
						<article id="main" class="container special" style="width: 300px;float: left;margin-left: 30px;margin-right: 30px;">
							<form id="business-form" method="POST">
								<label for="province">Province</label>
								<select id="province" name="province">
									<option id="default" name="default" value="0">All</option>
									<?php 
										$query = "SELECT p_id, code, name FROM province";
										$result = mysql_query($query) or die(mysql_error()."[".$query."]");
										$code="";
										if(isset($_POST) and isset($_POST['province'])){ 
											$code=$_POST['province'];
										} 
										while ($row = mysql_fetch_array($result))
										{
											$sel="";
											if($code==$row['name']){ 
												$sel="selected";
											}
											echo "<option value='".$row['name']."' ".$sel." >".$row['name']."</option>";
										}
									?> 
								</select>
								<label for="sector">Sector</label>
								<select id="sector" name="sector">
									<option id="default" name="default" value="0">--select--</option>
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
											if($code==$row['id']){ 
												$sel="selected";
											}
											echo "<option value='".$row['id']."' ".$sel." >".$row['name']."</option>";
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
									<input type="text" id="labour" name="labour" value="<?php if(isset($_POST) and isset($_POST['labour']) and $_POST['labour']) { echo $_POST['labour'];} ?>">
								</label>
								
								<div style="text-align: initial;">
									<label style="display: inline;" for="subsidy">Subsidy</label>
									<span style="margin-left: 40px;">
										<input type="radio" id="yes" value="yes" name="subsidy"  <?php if(isset($_POST) and isset($_POST['subsidy']) and $_POST['subsidy']=='yes') { echo "checked";} ?>>
										<label style="display: inline;" for="yes">Yes</label>
									</span>
									<span style="margin-left: 40px;">
										<input type="radio" id="no" value="no" name="subsidy" <?php if(isset($_POST) and isset($_POST['subsidy']) and $_POST['subsidy']=='no') { echo "checked";} ?>>
										<label style="display: inline;" for="no">No</label>
									</span>
								</div>
								
								
								<footer>
									<input type="submit" class="button" value="Go">
								</footer>
								
							</form>

						</article>

				</div>

				<!-- Features -->
				<div id="features" class="" style="margin-left: 360px;">
					
					<div id="chartdiv" style="width: 50%; height: 200px;"></div>
					
				</div>
			</div>
		<!-- Footer -->

	</body>
</html>
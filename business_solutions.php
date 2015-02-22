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
}
// print_r($_POST);
function get_city_details(){
	if(isset($_POST) and isset($_POST['province'])){
		$query = "SELECT p_id, code, name FROM city where p_id=";
		$result = mysql_query($query) or die(mysql_error()."[".$query."]");
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
				<div id="banner" style="float:left;background-color:#2b252c;">
						<article id="main" class="container special" style="width: 300px;float: left;margin-left: 30px;margin-right: 30px;">
							<form id="business-form" method="POST">
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
					<?php
						if(isset($_POST) and isset($_POST['province']) and $_POST['province']!=0){
							echo "<span><b>Population by age group</b><span>";
							echo "<div id='chartdiv' style='width: 50%; height: 200px;'></div>";
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
									<b>Average Weekly wages : <?php echo "$ ".$row['wages'];?></b> 
								</p>
								<p>
									<b>Total productive employees (x1000) : <?php echo $row['totalemp'];?></b> 
								</p>
							</p>
						</div>
						<p style="background: white;"></p>
					<?php }?>
				</div>
			</div>

	</body>
</html>
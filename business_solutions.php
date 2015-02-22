<!DOCTYPE HTML>
<html>
	<head>
		<title>CODE-EDOC</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
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

	
<?php


function connect(){
	$link = mysql_connect('localhost', 'root', '');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	// echo 'Connected successfully';
	
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
// print_r($_POST);
?>
<script>
$(document).ready(function(){
    $(".button").click(function(){
		var val='#div-'+$(this).val();
        $(val).fadeToggle("slow");
    });
});
</script>
	<body class="homepage">
		<h2 style="text-align: center;"><a href="#">Listed out according to the major cities.</a></h2>
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
											if($code==$row['code']){ 
												$sel="selected";
											}
											echo "<option value='".$row['code']."' ".$sel." >".$row['name']."</option>";
										}
									?> 
								</select>
								<label for="sector">Sector</label>
								<select id="sector" name="sector">
									<option id="default" name="default" value="0">--select--</option>
									<?php 
										$query = "SELECT id, name FROM sector";
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
					<?php foreach([1, 2, 3, 4, 5, 6] as $i){?>
					<h3>

						<button class="button" style="padding:1.65em 40.5em 1.65em 40.5em;" value="<?php echo $i; ?>" id="<?php echo $i; ?>" >Gravida aliquam penatibus</button>
					</h3>
					<div class="row fade" id="div-<?php echo $i; ?>" style="display:none;padding: 0px 100px 100px 100px;background: aquamarine;margin: 0px 0 0px 0px;">
						<p>
							Amet nullam fringilla nibh nulla convallis tique ante proin sociis accumsan lobortis. Auctor etiam
							porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum consequat integer interdum.
						</p>
					</div>
					<p style="background: white;"></p>
					<?php }?>
				</div>
			</div>
		<!-- Footer -->
		<!--	<div id="footer" style="clear: both;">
				<div class="container">
					<div class="row">
						<div class="12u"> -->
							
							<!-- Contact -->
						<!--		<section class="contact">
									<header>
										<h3>Nisl turpis nascetur interdum?</h3>
									</header>
									<p>Urna nisl non quis interdum mus ornare ridiculus egestas ridiculus lobortis vivamus tempor aliquet.</p>
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
										<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
										<li><a href="#" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
									</ul>
								</section>  -->
							
							<!-- Copyright -->
							<!--	<div class="copyright">
									<ul class="menu">
										<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
									</ul>
								</div>
							
						</div>
					
					</div>
				</div>
			</div> -->
	</body>
</html>
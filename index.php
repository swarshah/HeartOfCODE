<!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>HeartOfCODE</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.onvisible.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>

	
<?php


include 'connection.php';
connect();

?>
	<body class="homepage">

		<!-- Header -->
			<div id="header">
						
				<!-- Inner -->
					<div class="inner">
						<header>
							<h1><a href="index.html" id="logo">Business in Canada?</a></h1>
							<hr />
							<p>With the help of Canadian federal open datasets ensure you have a niche ahead of others</p>
						</header>
						<footer>
							<a href="#banner" class="button circled scrolly">Proceed</a>
						</footer>
					</div>
				
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="business_solutions.php">Business</a></li>
							<li><a href="credentials.php">Credentials</a></li>
						</ul>
					</nav>

			</div>
			
		<!-- Banner -->
			<section id="banner">
					<article id="main" class="container special">
						<header>
							<h2><a href="#banner">Just a few questions for the right query</a></h2>
						</header>
						<form id="questions-form" method="POST" action="business_solutions.php">
							<label for="province">Province</label>
							<select id="province" name="province">
								<option id="default" name="default" value="0">All</option>
								<?php 
									$query = "SELECT p_id, name FROM province";
									$result = mysql_query($query) or die(mysql_error()."[".$query."]");
									while ($row = mysql_fetch_array($result))
									{
										echo "<option value='".$row['p_id']."'>".$row['name']."</option>";
									}
								?> 
							</select>
							<br>
							<label for="sector">Industry</label>
							<select id="sector" name="sector">
								<?php 
									$query = "SELECT sector_id, name FROM sector";
									$result = mysql_query($query) or die(mysql_error()."[".$query."]");
									while ($row = mysql_fetch_array($result))
									{
										echo "<option value='".$row['sector_id']."'>".$row['name']."</option>";
									}
								?> 
							</select>
							<br>
							<label for="capital">Initial Capital</label>
							<select id="capital" name="capital">
								<option id="default" name="default" value="0">--select--</option>
								<option value="1">1000 < 10000</option>
								<option value="2">10000 - 50000</option>
								<option value="3">> 50000</option> 
							</select>
							<br>
							<label for="labour">No of Labour
								<input type="text" id="labour" name="labour">
							</label>
							<br>
							
							<footer>
								<input type="submit" class="button" value="Go">
								<br>
								<br>
							</footer>
							
						</form>

					</article>
			</section>
		

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
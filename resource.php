<?php 
	require "config/config.php";
	$currentPage = "resources";
?>

<!DOCTYPE html>
<html lang="en-us">
<head>
	<!-- Basic Information -->
	<meta charset="utf-8">
	<title>USC Campus Security</title>
	<meta name="description" content="Look up emergencies happening around the USC campus">
	<meta name="author" content="Jiho Lee">

	<!-- Mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Font -->
	<link rel="stylesheet" href="https://use.typekit.net/avw1jas.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700;900&display=swap" rel="stylesheet">
	
	<!-- Stylesheet -->
	<link rel="stylesheet" href="css/normalize.css">
  	<link rel="stylesheet" href="css/skeleton.css">
  	<link rel="stylesheet" type="text/css" href="css/local-style.css">

  	<!-- Font Awesome -->
  	<script src="https://kit.fontawesome.com/b6c33349f0.js" crossorigin="anonymous"></script>

  	<!-- Favicon -->
  	 <link rel="icon" type="image/png" href="images/app-favicon.png">

</head>	
<body>
	<div class="content">
		<!-- Import Navigation Bar -->
		<?php include 'config/navbar.php'; ?>
		<!-- Search Resource Section -->
		<div class="container search">
			<div class="row">
				<div class="twelve columns top-gap">
					<h3>Resources</h3>
					<!-- <form action="" method="GET">
						<input type="text" name="log-search" placeholder="Type something"/><input type="submit" value="Search"/>
					</form> -->

				</div>
			</div>
		</div>
		<!-- Resource Card Section -->
		<div class="container bottom-gap">
			<div class="row">
				<div class="four columns card resource">
					<h4 class="card-title"><a href="https://dps.usc.edu/services/safety-app/" target="_blank">LiveSafe Mobile Safety App</a></h4>
					<p class="card-caption">LiveSafe, managed by the USC Department of Public Safety and the USC Department of Emergency Planning, is a free downloadable app that mobile users can use to initiate contact with emergency responders around the University Park and Health Science campuses.
					</p>
				</div>
				<div class="four columns card resource">
					<h4 class="card-title"><a href="https://dps.usc.edu/services/trojans-alerts/" target="_blank">TrojansAlert</a></h4>
					<p class="card-caption">TrojansAlert is an emergency notification system that allows university officials to contact you during an emergency by sending messages via text message and email. When an emergency occurs, authorized USC senders will instantly notify you with real-time updates, instructions on where to go, what to do (or what not to do), whom to contact and other important information.
					</p>
				</div>
			</div>
		</div>
		<!-- Footer -->
		<!-- <footer>
			<p>Coded by Jiho Lee</p>
		</footer> -->
	</div>

	
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- External Javascript -->
	<script type="text/javascript" src="js/search.js"></script>

</body>
</html>
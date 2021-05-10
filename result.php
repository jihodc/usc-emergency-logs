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
	<div class="content bottom-gap">
		<!-- Import Navigation Bar -->
		<?php include 'config/navbar.php'; ?>
		<div id="main-logo">
			<img src="images/usc-logo.png" alt="University of Southern California Logo">
		</div>
		<!-- Search Section -->
		<div class="container search">
			<form action="result.php" method="GET">
				<div class="row">
					<div class="twelve columns">
						<input type="text" name="log-search" placeholder="Type something"/><input type="submit" value="Search"/>
					</div>
				</div>
				<div class="row">
					<div class="twelve columns" id="filter">
						<h6>Filter <i class="fas fa-filter"></i></h6>
					</div>
				</div>
				<div id="detail">
					<div class="row">
						<div class="twelve columns">
							<label>Incident Type:</label>
							<select name="incidents">
								<option value="select" selected>Select</option>
							</select>
						</div>
					</div>
					<div class="row" id="date-filter">
						<div class="four columns">
							<label>From Date:</label>
							<input type="date" name="date-start" min="2021-01-01" max="2021-12-12">
						</div>
						<div class="four columns">
							<label>To Date:</label>
							<input type="date" name="date-end" min="2021-01-01" max="2021-12-12">
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="container result">
			<div class="row" id="display">
				<div class="eight columns" id="display-option">
					<label>Order by: </label>
					<select name="order">
						<option>Newest</option>
						<option>Oldest</option>
					</select>
					<label>Disposition: </label>
					<select name="disposition">
						<option>All</option>
						<option>Open</option>
						<option>Pending</option>
						<option>Closed</option>
					</select>
				</div>
				<div class="four columns" id="stack-map">
					<i class="fas fa-layer-group selected" id="stack"></i>
					<i class="fas fa-map-marker-alt"id="map"></i>
				</div>
			</div>
		</div>
		<!-- Stack Display -->
		<div id="outcome-stack">
			<div class="container result-card">
				<div class="row">
					<div class="one-half column">
						<h6>Incident Case</h6>
						<p><i class="fas fa-map-marker-alt"></i>Location Information</p>
						<p>Reported: 1/25/21 10:46 am</p>
					</div>
					<div class="one-half column">
						<h6>Report #123456</h6>
						<p>Disposition: Open</p>
						<h6>Click for Details</h6>
					</div>
				</div>
				<div class="row">
					<div class="twelve columns details">
						<p>Occurred: 1/23/21 9:45 am to 1/23/21 11:33 am</p>
						 <p>This is where the summary of the incident is displayed</p>
					</div>
				</div>
			</div>
			<div class="container result-card">
				<div class="row">
					<div class="one-half column">
						<h6>Incident Case</h6>
						<p><i class="fas fa-map-marker-alt"></i>Location Information</p>
						<p>Reported: 1/25/21 10:46 am</p>
					</div>
					<div class="one-half column">
						<h6>Report #123456</h6>
						<p>Disposition: Open</p>
						<h6>Click for Details</h6>
					</div>
				</div>
				<div class="row">
					<div class="twelve columns details">
						<p>Occurred: 1/23/21 9:45 am to 1/23/21 11:33 am</p>
						 <p>This is where the summary of the incident is displayed</p>
					</div>
				</div>
			</div>
		</div>
		<!-- Map Display -->
		<div id="outcome-map" class="hide">
			<div class="container" id="map-section">
				<div class="twelve columns">
					<p>Map</p>
				</div>
			</div>
			<div class="container result-card">
				<div class="row">
					<div class="one-half column">
						<h6>Incident Case</h6>
						<p><i class="fas fa-map-marker-alt"></i>Location Information</p>
						<p>Reported: 1/25/21 10:46 am</p>
					</div>
					<div class="one-half column">
						<h6>Report #123456</h6>
						<p>Disposition: Open</p>
						<h6>Click for Details</h6>
					</div>
				</div>
				<div class="row">
					<div class="twelve columns details">
						<p>Occurred: 1/23/21 9:45 am to 1/23/21 11:33 am</p>
						 <p>This is where the summary of the incident is displayed</p>
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
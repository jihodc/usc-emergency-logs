<!DOCTYPE html>
<html>
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
		<!-- Top Naviagation Bar -->
		<div class="top-nav">
			<!-- Hamburger Menu Icon -->
			<a class="menu-icon"><i class="fas fa-bars"></i></a>
			<!-- Navigation Links -->
			<div id="nav-links">
				<a href="search.php">Search</a>
				<a href="resource.php">Resources</a>
				<a href="about.php">About</a>
				<a href="admin.php"><i class="fas fa-lock"></i></a>
			</div>
			<a href="#" id="logo">USC Emergency Logs</a>
		</div>
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
		<!-- Frequently Searched Keywords -->
		<div class="container">
			<div id="keywords"><h5>Frequently Searched Keywords</h5>
				<div class="row">
					<div class="one-third column tag">Grand Theft Auto</div>
					<div class="one-third column tag">Burglary</div>
					<div class="one-third column tag">Assault and Battery</div>
				</div>
			</div>
		</div>
		<!-- Most Recent Reports -->
		<div class="container" id="report">
			<div id="recent"><h6>Most Recent Reports</h6></div>
			<div class="row">
				<div class="card three columns">
					<p class="card-map">Map</p>
					<h4 class="card-title">Sexual Misconduct</h4>
					<p class="card-caption"><i class="fas fa-map-marker-alt"></i> Location</p>
				</div>
				<div class="card three columns">
					<p class="card-map">Map</p>
					<h4 class="card-title">Sexual Misconduct</h4>
					<p class="card-caption"><i class="fas fa-map-marker-alt"></i> Location</p>
				</div>
			</div>
		</div>
		<!-- Last Month Summary -->
		<div class="container" id="monthly">
			<h6>Last Month Summary</h6>
			<p>There has been <span class="trojan">250</span> reports made around the campus vicinity last month.</p>
			<div class="row">
				<div class="twelve columns"></div>
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
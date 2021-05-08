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
		<!-- Data Input -->
		<div class="container" id="add">
			<form action="" method="GET">
				<div class="row">
					<div class="twelve columns top-gap">
						<h3>Add Incident</h3>
						<p>All sections are required.</p>
						<label for="report" >Report #<span class="trojan">*</span></label>
						<input type="text" name="report" required>
						<label for="report">Report Date:<span class="trojan">*</span></label>
						<input type="datetime-local" name="report" min="2021-01-01" max="2021-12-12" required>
						<label for="incident">Incident<span class="trojan">*</span></label>
						<select name="incdients" required>
							<option>Select</option>
						</select>
						<label for="title" >Title<span class="trojan">*</span></label>
						<input type="text" name="title" required>
						<label for="date-start">Start Date:<span class="trojan">*</span></label>
						<input type="datetime-local" name="date-start" min="2021-01-01" max="2021-12-12" required>
						<label for="date-end">End Date:<span class="trojan">*</span></label>
						<input type="datetime-local" name="date-end" min="2021-01-01" max="2021-12-12" required>
						<label for="summary">Incident Summary<span class="trojan">*</span></label>
						<textarea name="summary" placeholder="Enter in the summary of the incident" required></textarea>
						<label for="desposition">Desposition<span class="trojan">*</span></label>
						<select name="desposition" required>
							<option>Open</option>
							<option>Closed</option>
							<option>Pending</option>
						</select>
						<label for="location">Location<span class="trojan">*</span></label>
						<input type="text" name="location">

						<input type="submit" value="Add"/>
					</div>
				</div>
			</form>
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
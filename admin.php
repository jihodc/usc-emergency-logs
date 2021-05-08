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
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700;900&display=swap" rel="stylesheet">>

	<!-- Stylesheet -->
	<link rel="stylesheet" href="css/normalize.css">
  	<link rel="stylesheet" href="css/skeleton.css">
  	<link rel="stylesheet" type="text/css" href="css/local-style.css">

  	<!-- Font Awesome -->
  	<script src="https://kit.fontawesome.com/b6c33349f0.js" crossorigin="anonymous"></script>

  	<!-- Favicon -->
  	 <link rel="icon" type="image/png" href="images/app-favicon.png">

</head>
<body scroll="no" class="lock">
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
		<div class="container" id="login">
			<div class="row">
				<div class="twelve columns top-gap" id="login-child">
					<img src="images/usc-logo.png" alt="usc logo">
					<div class="twelve columns" id="identification">
						<form action="admin-home.php" method="">
							<label for="username">Username</label>
							<input type="text" name="username">
							<label for="password">Password</label>
							<input type="password" name="password">
							<input type="submit" name="login" value="Login">
						</form>
					</div>
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
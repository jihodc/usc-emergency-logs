<?php 
	require "config/config.php";
	$currentPage = "admin-home";

?>

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
	<div class="content">
		<!-- Import Navigation Bar -->
		<?php include 'config/navbar.php'; ?>
		<!-- Button Sections -->
		<div class="container">
			<div class="row">
				<div class="twelve columns top-gap panel">
					<h5>Add Data</h5>
					<p>Add new data to the current database.</p>
					<a href="add.php"><button>Add Data</button></a>
				</div>
				<div class="twelve columns panel">
					<h5>Update Data</h5>
					<p>Update or delete current database.</p>
					<a href="#"><button>Update/Delete Data</button></a>
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
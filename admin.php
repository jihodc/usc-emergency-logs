<?php 
	// Session already imported in config.php
	require "config/config.php";
	$currentPage = "admin";

	// Server-side validation
	// Check if user is already logged in
	if (!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) {
		// Check if username and password has been submitted via POST
		if(isset($_POST["username"]) && isset($_POST["password"])) {
			// Check if username and password exists
			if(empty($_POST["username"]) || empty($_POST["password"])) {
				$error = "Please enter username and password";
			} else {
				// Knowing that username and password exists, compare it to the ones that exist in DB
				$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				if($conn->connect_errno) {
					echo $conn->connect_error;
					exit();
				}
				// Hashed password
				$passwordInput = hash("sha256", $_POST["password"]);
				$usernameInput = $_POST["username"];

				// Prepared statement
				$statement = $conn->prepare("SELECT * FROM accounts WHERE username= ? AND password= ?");
				$statement->bind_param("ss", $usernameInput, $passwordInput);
				$execute = $statement->execute();
				if(!$execute) {
					echo $conn->error;
					exit();
				}

				// Stored the returned value from DB
				$statement->store_result();
				
				// If you get at least one result, it means the account exists in database
				if($statement->num_rows > 0) {
					// log in success!
					// set session variables to remember the username
					$_SESSION["username"] = $_POST["username"];
					$_SESSION["logged_in"] = true;

					// Redirect logged in user to the admin homepage
					header("Location: admin-home.php");
				} else {
					$error = "Invalid username or password";
				}

			}
			$statement->close();
			$conn->close();
		}

	} else {
		// Already logged in user will be redireced to another page
		header("Location: admin-home.php");
	}
	
	
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
		<!-- Import Navigation Bar -->
		<?php include 'config/navbar.php'; ?>
		<div class="container" id="login">
			<div class="row">
				<div class="twelve columns top-gap" id="login-child">
					<img src="images/usc-logo.png" alt="usc logo">
					<div class="twelve columns" id="identification">
						<form action="admin.php" method="POST">
							<label for="username">Username</label>
							<input type="text" name="username">
							<label for="password">Password</label>
							<input type="password" name="password">
							<div class="bad">
								<!-- Show server-side errors here -->
								<?php 
									if(isset($error) && !empty($error)) {
										echo $error;
									}
								?>
							</div>
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
	<script type="text/javascript" src="js/client-side-validation.js"></script>

</body>
</html>
<?php 
	require "config/config.php";
    $currentPage = "delete-confirm";

	$isDeleted = false;

	if (!isset($_GET["id"]) || empty($_GET["id"]) || !isset($_GET["title"]) || empty($_GET["title"])) {
		$error = "No matching data found";
	}
	else {
		require 'config/conn.php';

		// Generate the SQL statement
		$sql = "DELETE FROM reports WHERE id = ". $_GET["id"] . ";";

		$results = $conn->query($sql);
		if (!$results) {
			echo $conn->error;
			exit();
		}

		if($conn->affected_rows == 1) {
			$isDeleted = true;
		}

		$conn->close();

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
		<!-- Body -->
		<div class="container">
    		<div class="row">
				<div class="eight columns top-gap">
                    <h3>Confirmation</h3>
                    <p>
                    <?php if(isset($error) && !empty($error)) :?>
                        <span class="bad"><?php echo $error; ?></span>
                    <?php endif;?>
                    <?php if ($isDeleted) : ?>
						<span class="good"><?php echo $_POST["title"]; ?> was successfully deleted.</span>
				    <?php endif;?>
                    </p>
				</div>
    		</div>
            <div class="row confirm">
                <div class="one-half columns">
                    <a href="update.php"><button>Back to Update Data</button></a>
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
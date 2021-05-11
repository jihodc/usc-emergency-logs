<?php 

    require 'config/config.php';
    $currentPage = "add-confirm";

    var_dump($_POST);
    // echo "<hr/>";
    // echo date("Y-m-d H:i:s", strtotime($_POST["date-end"]));

    $isUpdated = false;

    // Check for all required field is entered in
    if (!isset($_POST["report-number"]) || empty($_POST["report-number"]) || !isset($_POST["report-date"]) || empty($_POST["report-date"]) || !isset($_POST["incident"]) || empty($_POST["incident"]) || !isset($_POST["title"]) || empty($_POST["title"]) || !isset($_POST["date-start"]) || empty($_POST["date-start"]) || !isset($_POST["date-end"]) || empty($_POST["date-end"]) || !isset($_POST["summary"]) || empty($_POST["summary"]) || !isset($_POST["desposition"]) || empty($_POST["desposition"]) || !isset($_POST["location"]) || empty($_POST["location"])) {
        $error = "Please fill out all the required fields";
    } else {
        require 'config/conn.php';

        // Handle optional 
        if (isset($_POST["location-x"]) && !empty($_POST["location-x"])) {
			$x_coordinate = $_POST["location-x"];
		}
		else {
			$x_coordinate = null;
		}

        if (isset($_POST["location-y"]) && !empty($_POST["location-y"])) {
			$y_coordinate = $_POST["location-y"];
		}
		else {
			$y_coordinate = null;
		}

        // Convert Time
        $convert_report_time = date("Y-m-d H:i:s", strtotime($_POST["report-date"]));
        $convert_date_start =  date("Y-m-d H:i:s", strtotime($_POST["date-start"]));
        $convert_date_end =  date("Y-m-d H:i:s", strtotime($_POST["date-end"]));

        // Create sql statement
        $statement = $conn->prepare("UPDATE reports  SET report_title = ?, report_time = ?, event_start = ?, event_end = ?, location = ?, x_coord = ?, y_coord = ?, event_summary = ?, report_number = ?, Despositions_id = ?, Incidents_id = ? WHERE id = ?");
        $statement->bind_param("sssssddsiiii", $_POST["title"], $convert_report_time, $convert_date_start, $convert_date_end, $_POST["location"], $x_coordinate, $y_coordinate, $_POST["summary"], $_POST["report-number"], $_POST["desposition"], $_POST["location"], $_POST["id"]);
        $execute = $statement->execute();
        if(!$execute) {
            echo $conn->error;
        }

        if($conn->affected_rows == 1) {
            $isUpdated = true;
        }

        $statement->close();
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
		<?php // include 'config/navbar.php'; ?>
		<!-- Body -->
		<div class="container">
    		<div class="row">
				<div class="eight columns top-gap">
                    <h3>Confirmation</h3>
                    <p>
                    <?php if(isset($error) && !empty($error)) :?>
                        <span class="bad"><?php echo $error; ?></span>
                    <?php endif;?>
                    <?php if ($isUpdated) : ?>
						<span class="good"><?php echo $_POST["title"]; ?> was successfully updated.</span>
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
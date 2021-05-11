<?php 
	require 'config/config.php';
	$currentPage = "result";

	// Connect to DB
	require 'config/conn.php';

	// var_dump($_GET);
	$sql = "SELECT reports.id AS id, reports.report_title AS title, reports.report_time AS report_time, reports.event_start AS event_start, event_end AS event_end, reports.location AS location, reports.event_summary AS summary, reports.report_number AS report_number, despositions.status AS status, incidents.type AS type
	FROM reports
	LEFT JOIN incidents
		ON reports.Incidents_id = incidents.id
	LEFT JOIN despositions
		ON reports.Despositions_id = despositions.id
	WHERE 1 = 1";

	// FOR SEARCH RESULT FORMS
	$desposition = $conn->prepare("SELECT * FROM despositions");
	$execute = $desposition->execute();
	if(!$execute) {
		echo $conn->error;
		exit();
	}

	// Save result returned from 
	$desposition_result = $desposition->get_result();


	// FOR INCIDENT
	$incident = $conn->prepare("SELECT * FROM incidents");
	$execute = $incident->execute();
	if(!$execute) {
		echo $conn->error;
		exit();
	}

	// Save result returned from 
	$incident_result = $incident->get_result();

	// $_GET check
	if(isset($_GET["log-search"]) && !empty($_GET["log-search"])) {
		$sql = $sql . " AND reports.report_title LIKE '%" . $_GET["log-search"] . "%'";
	}

	if(isset($_GET["incidents"]) && !empty($_GET["incidents"])) {
		$sql = $sql . " AND reports.Incidents_id = " . $_GET["incidents"]; 
	}

	if(isset($_GET["date-start"]) && !empty($_GET["date-start"]) && isset($_GET["date-end"]) && !empty($_GET["date-end"])) {
		$sql = $sql . " AND report_time BETWEEN '" . $_GET["date-start"] . " 00:00:00' AND '" . $_GET["date-end"] . " 23:59:59'";
	}
	// $_GET from RESULTS
	if(isset($_GET["desposition"]) && !empty($_GET["desposition"])) {
		$sql = $sql . " AND reports.Despositions_id = " . $_GET["desposition"];
	}
	if(isset($_GET["order"]) && !empty($_GET["order"])) {
		$sql = $sql . " ORDER BY report_time " . $_GET["order"] . ";";
	} else {
		$sql = $sql . " ORDER BY report_time DESC;";
	}

	// echo $sql;

	// submit the query
	$results = $conn->query($sql);
	if (!$results) {
		echo $conn->error;
		exit();
	}

	// var_dump($results->fetch_assoc());

	$conn->close();
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
	<div class="content bottom-gap">
		<!-- Import Navigation Bar -->
		<?php include 'config/navbar.php'; ?>
		<div id="main-logo">
			<img src="images/usc-logo.png" alt="University of Southern California Logo">
		</div>
		<!-- Search Section -->
		<div class="container search">
			<form action="update.php" method="GET" id="search-log">
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
								<option value="" selected>SELECT</option>
								<!-- PRINT OUT INCIDENT TYPES FROM DB -->
								<?php if ($incident_result->num_rows > 0) : ?>
									<?php while($row = $incident_result->fetch_assoc()) : ?>
										<option value="<?php echo $row['id']; ?>">
											<?php echo $row['type']; ?>
										</option>
									<?php endwhile; ?>
								<?php endif; ?>
								<?php $incident->close(); ?>
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
			<form action="result.php" method="GET">
				<div class="row" id="display">
					<div class="ten columns" id="display-option">
						<label>Order by: </label>
						<select name="order" form="search-log">
							<option value="DESC" se>Newest</option>
							<option value="ASC">Oldest</option>
						</select>
						<label>Disposition: </label>
						<select name="desposition" form="search-log">
							<option value="" selected>All</option>
							<!-- PRINT OUT DESPOSITION TYPES FROM DB -->
							<?php if ($desposition_result->num_rows > 0) : ?>
								<?php while($row = $desposition_result->fetch_assoc()) : ?>
									<option value="<?php echo $row['id']; ?>">
										<?php echo $row['status']; ?>
									</option>
								<?php endwhile; ?>
							<?php endif; ?>
							<?php $desposition->close(); ?>
						</select>
					</div>
					<!-- <div class="four columns" id="stack-map">
						<i class="fas fa-layer-group selected" id="stack"></i>
						<i class="fas fa-map-marker-alt"id="map"></i>
					</div> -->
				</div>
			</form>
			<div class="row">
				<div class="twelve column">
					<span>Showing <?php echo $results->num_rows;?> result(s).
				</div>
			</div>
		</div>
		<!-- Stack Display -->
		<div id="outcome-stack">
			<!-- DISPLAY RESULTS -->
			<? while($row = $results->fetch_assoc()) :?>
				<div class="container result-card">
					<div class="row">
						<div class="one-half column">
							<h6><?php echo $row['title'] ?></h6>
							<p><i class="fas fa-map-marker-alt"></i><?php echo $row['location'] ?></p>
							<p>Reported: <?php echo $row['report_time'] ?></p>
						</div>
						<div class="one-half column">
							<h6>Report #<?php echo $row['report_number'] ?></h6>
							<p>Disposition: <?php echo $row['status'] ?></p>
							<h6>Click for Details</h6>
						</div>
					</div>
					<div class="row">
						<div class="twelve columns details">
							<p>Occurred: <?php echo $row['event_start'] ?> to <?php echo $row['event_end'] ?></p>
							<p><?php echo $row['summary'] ?></p>
							<a class="confirm" href="update-detail.php?id=<?php echo $row['id'];?>"><button>Edit</button></a>
							<a class="muted" onclick="return confirm('Are you sure you want to delete this Incident?');" href="delete-confirmation.php?id=<?php echo $row['id']; ?>&title=<?php echo $row['title']?>"><button>Delete</button></a>
						</div>
					</div>
				</div>
			<?php endwhile;?>
		<!-- Map Display -->
		<!-- <div id="outcome-map" class="hide">
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
		</div> -->
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
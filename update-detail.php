<?php 
	require 'config/config.php';
	$currentPage = "update-detail";

	if(!isset($_GET["id"]) || empty($_GET["id"])) {
		$error = "No matching data found";
	} else {
		// Connect to DB
		require 'config/conn.php';

		$desposition = $conn->prepare("SELECT * FROM despositions");
		$execute = $desposition->execute();
		if(!$execute) {
			echo $conn->error;
			exit();
		}

		// Save result returned from 
		$desposition_result = $desposition->get_result();

		$incident = $conn->prepare("SELECT * FROM incidents");
		$execute = $incident->execute();
		if(!$execute) {
			echo $conn->error;
			exit();
		}

		// Save result returned from 
		$incident_result = $incident->get_result();

		// Generate the SQL statement to grab details of this song
		$sql = "SELECT * FROM reports WHERE id = " . $_GET['id'] . ";";

		// Query the db!
		$results = $conn->query($sql);
		if(!results) {
			echo $conn->error;
			exit();
		}
		// We only get ONE results back so no need to do a while loop
		$output = $results->fetch_assoc();

		// var_dump($output);
		//echo date("Y-m-d\TH:i:s", strtotime($row["report_time"]));
		// Close DB Connection
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
	<div class="content bottom-gap">
		<!-- Import Navigation Bar -->
		<?php include 'config/navbar.php'; ?>
		<!-- Data Input -->
		<div class="container" id="add">
			<form action="update-confirmation.php" method="POST">
				<div class="row">
					<div class="twelve columns top-gap">
						<h3>Update Incident</h3>
						<p>Most sections are required.</p>
						<!-- ERROR CHECK -->
						<?php if(isset($error) && !empty($error)) : ?>
                        	<span class="bad"><?php echo $error; ?></span>
                    	<?php else : ?>
							<label for="report" >Report #<span class="trojan">*</span></label>
							<input type="text" name="report-number" required value="<?php echo $output["report_number"]; ?>">
							<label for="report-date">Report Date:<span class="trojan">*</span></label>
							<input type="datetime-local" name="report-date" min="2021-01-01" max="2021-12-12" required value="<?php echo date("Y-m-d\TH:i:s", strtotime($output["report_time"])); ?>">
							<label for="incident">Incident<span class="trojan">*</span></label>
							<select name="incident" required>
								<option value="">----</option>
								<!-- PRINT OUT INCIDENT TYPES FROM DB -->
							<?php if ($incident_result->num_rows > 0): ?>
								<?php while($row = $incident_result->fetch_assoc()) : ?>
									<?php if ($row['id'] == $output['Incidents_id']) :?>
										<option selected value="<?php echo $row['id']; ?>">
											<?php echo $row['type']; ?>
										</option>
									<?php else : ?>
										<option value="<?php echo $row['id']; ?>">
											<?php echo $row['type']; ?>
										</option>
									<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>
								<?php $incident->close(); ?>
							</select>
							<label for="title" >Title<span class="trojan">*</span></label>
							<input type="text" name="title" required value="<?php echo $output["report_title"]; ?>">
							<label for="date-start">Start Date:<span class="trojan">*</span></label>
							<input type="datetime-local" name="date-start" min="2021-01-01" max="2021-12-12" required  value="<?php echo date("Y-m-d\TH:i:s", strtotime($output["event_start"])); ?>">
							<label for="date-end">End Date:<span class="trojan">*</span></label>
							<input type="datetime-local" name="date-end" min="2021-01-01" max="2021-12-12" required value="<?php echo date("Y-m-d\TH:i:s", strtotime($output["event_end"])); ?>">
							<label for="summary">Incident Summary<span class="trojan">*</span></label>
							<textarea name="summary" placeholder="Enter in the summary of the incident" required ><?php echo $output["event_summary"]; ?></textarea>
							<label for="desposition">Disposition<span class="trojan">*</span></label>
							<select name="desposition" required>
								<!-- PRINT OUT DESPOSITION TYPES FROM DB -->
								<?php if ($desposition_result->num_rows > 0): ?>
									<?php while($row = $desposition_result->fetch_assoc()) : ?>
										<?php if ($row['id'] == $output['Despositions_id']) :?>
											<option selected value="<?php echo $row['id']; ?>">
												<?php echo $row['status']; ?>
											</option>
										<?php else : ?>
											<option value="<?php echo $row['id']; ?>">
												<?php echo $row['status']; ?>
											</option>
										<?php endif; ?>
									<?php endwhile; ?>
								<?php endif; ?>
								<?php $desposition->close(); ?>
							</select>
							<label for="location">Location<span class="trojan">*</span></label>
							<input type="text" name="location" required value="<?php echo $output["location"]; ?>">
							<label for="location-x">x-coordinate</label>
							<input type="text" name="location-x" value="<?php echo $output["x_coord"]; ?>">
							<label for="location-x">y-coordinate</label>
							<input type="text" name="location-y" value="<?php echo $output["y_coord"]; ?>">
							<!-- INVISIBLE -->
							<input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">


							<input type="submit" value="Change"/>
						<?php endif; ?>
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
	<script type="text/javascript" src="js/client-side-validation.js"></script>
</body>
</html>
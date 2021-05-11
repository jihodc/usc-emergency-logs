<?php 
	require 'config/config.php';
	$currentPage = "search";

	// Connect to DB
	require 'config/conn.php';

	$statement = $conn->prepare("SELECT * FROM incidents");
	$execute = $statement->execute();
	if(!$execute) {
		echo $conn->error;
		exit();
	}

	// Save result returned from 
	$result = $statement->get_result();

	// var_dump($result->num_rows);

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
								<option value="" selected>SELECT</option>
								<!-- PRINT OUT INCIDENT TYPES FROM DB -->
								<?php if ($result->num_rows > 0): ?>
									<?php while($row = $result->fetch_assoc()) : ?>
										<option value="<?php echo $row['id']; ?>">
											<?php echo $row['type']; ?>
										</option>
									<?php endwhile; ?>
								<?php endif;?>
								<?php $statement->close(); ?>
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
					<!-- Hide only to pass it around -->
					<div class="hide">
						<label>Order:</label>
						<select name="order">
							<option value="" selected>SELECT</option>
						</select>
						<label>
						<label>Desposition:</label>
						<select name="disposition">
							<option value="" selected>SELECT</option>
						</select>
						<label>
					</div>
				</div>
			</form>
		</div>
		<!-- Frequently Searched Keywords -->
		<div class="container">
			<div id="keywords"><h5>Frequently Occuring Incidents</h5>
				<div class="row" id="frequent-incidents">
					<div class="one-third column tag">Test</div>
					<div class="one-third column tag">Test</div>
					<div class="one-third column tag">Test</div>
				</div>
			</div>
		</div>
		<!-- Most Recent Reports -->
		<div class="container" id="report">
			<div id="recent"><h6>Most Recent Reports</h6></div>
			<div class="row" id="recent-incidents">
				<div class="card three columns">
					<p class="card-map">10/1/2020</p>
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
				<div class="twelve columns"><canvas id="myChart" width="100%" height="50%"></canvas></div>
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
	<!-- External JS for DB AJAX -->
	<script type="text/javascript" src="js/ajax.js"></script>
	<!-- External JS chart.js -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3/dist/chart.min.js"></script>
	<script type="text/javascript" src="js/myChart.js"></script>
	<!-- Fill the frequently occuring incidents with DB data -->
	<script>
		// FOR FREQUENTLY SEARCHED INCIDENTS
		ajaxGet("ajax/search-frequent.php", function(results) {
			// console.log(results);
			let jsResults = JSON.parse(results)
			// console.log(jsResults);
			let resultList = document.querySelector("#frequent-incidents");

			// Clear all previous elements
			while(resultList.hasChildNodes()) {
				resultList.removeChild(resultList.lastChild);
			}

			for(let i = 0; i < jsResults.length; i++) {
				let div = document.createElement("div");
				div.classList.add("one-third");
				div.classList.add("column");
				div.classList.add("tag");
				div.setAttribute("data-id", jsResults[i].Incidents_id);
				div.innerHTML = jsResults[i].type;
				resultList.appendChild(div);
			}
		})

		// FOR RECENTLY OCCURED INCIDENTS
		ajaxGet("ajax/search-recent.php", function(results) {
			// console.log(results);
			let jsResults = JSON.parse(results)
			// console.log(jsResults);
			let resultList = document.querySelector("#recent-incidents");

			// Clear all previous elements
			while(resultList.hasChildNodes()) {
				resultList.removeChild(resultList.lastChild);
			}

			for(let i = 0; i < jsResults.length; i++) {
				let div = document.createElement("div");
				div.classList.add("card", "three", "columns");
				let p = document.createElement("p");
				p.classList.add("card-map");
				p.innerHTML = jsResults[i].report_time;
				let h4 = document.createElement("h4");
				h4.classList.add("card-title");
				h4.innerHTML = jsResults[i].report_title;
				let p2 = document.createElement("p");
				p2.classList.add("card-caption");
				p2.innerHTML = "<i class='fas fa-map-marker-alt'></i> " + jsResults[i].location;

				div.appendChild(p);
				div.appendChild(h4);
				div.appendChild(p2);

				resultList.appendChild(div);
			}
		})

		// FOR MONTHLY SUMMARY
		ajaxGet("ajax/search-summary.php", function(results) {
			// console.log(results);
			let jsResults = JSON.parse(results)
			// console.log(jsResults);
			let resultList = document.querySelector(".trojan");

			// Clear all previous elements
			while(resultList.hasChildNodes()) {
				resultList.removeChild(resultList.lastChild);
			}

			resultList.innerHTML = jsResults[0].total;
		})
	</script>
</body>
</html>
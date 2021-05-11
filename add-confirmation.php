<?php 

    require 'config/config.php';
    $currentPage = "add-confirm";

    var_dump($_POST);
    echo "<hr/>";
    echo date("Y-m-d H:i:s", strtotime($_POST["date-end"]));

    $isAdded = false;

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

        // create sql statement
        $statement = $conn->prepare("INSERT INTO reports (report_title, report_time, event_start, event_end, location, x_coord, y_coord, event_summary, report_number, Despositions_id, Incidents_id) VALUES (?, ? ,? ,?, ?, ?, ?, ?, ?, ? ,?);");
        $statement->bind_param();
        $execute = $sql->execute();
        if(!$execute) {
            echo $conn->error;
        }
    }

?>
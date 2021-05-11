<?php 

    require "../config/config.php";
    require "../config/conn.php";

    // Load the recently occured incident
    $recent = "SELECT report_title, report_time, location FROM reports ORDER BY report_time DESC LIMIT 4;";
    $recent_results = $conn->query($recent);
    if(!$recent_results) {
        echo $conn->error;
        exit();
    }

    $conn->close();

    // empty array to store the things coming from DB
    $recent_array = [];

    while($row = $recent_results->fetch_assoc()) {
        array_push($recent_array, $row);
    }

    // encode the associated array into a json string
    // pass the data into the frontend through echo
    echo json_encode($recent_array);

?>
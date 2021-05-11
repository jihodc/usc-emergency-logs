<?php 

    require "../config/config.php";
    require "../config/conn.php";

    // Load the total summary of incidents last month
    $summary = "SELECT COUNT(*) AS total FROM reports WHERE YEAR(report_time) = YEAR(now()) AND MONTH(report_time) = (MONTH(now()) - 1);";
    $summary_results = $conn->query($summary);
    if(!$summary_results) {
        echo $conn->error;
        exit();
    }

    $conn->close();

    // empty array to store the things coming from DB
    $summary_array = [];

    while($row = $summary_results->fetch_assoc()) {
        array_push($summary_array, $row);
    }

    // encode the associated array into a json string
    // pass the data into the frontend through echo
    echo json_encode($summary_array);

?>
<?php 

    require "../config/config.php";
    require "../config/conn.php";

    // Load the freqently searched keywords
    $frequent = "SELECT incidents.type, reports.Incidents_id, COUNT(*) FROM reports JOIN incidents ON reports.Incidents_id = incidents.id GROUP BY incidents.type ORDER BY COUNT(*) DESC LIMIT 3;";
    $frequent_results = $conn->query($frequent);
    if(!$frequent_results) {
        echo $conn->error;
        exit();
    }

    $conn->close();

    // empty array to store the things coming from DB
    $frequent_array = [];

    while($row = $frequent_results->fetch_assoc()) {
        array_push($frequent_array, $row);
    }

    // encode the associated array into a json string
    // pass the data into the frontend through echo
    echo json_encode($frequent_array);

?>
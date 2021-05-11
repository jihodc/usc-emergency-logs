<?php 

    // DB connection if not show error
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($conn->connect_errno) {
        echo $conn->connect_error;
        exit();
    }

    // unicode
    $conn->set_charset('utf-8');

?>
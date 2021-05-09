
<?php

    // for session storage persisting in backend
    session_start();

    // Heroku ClearDB credentials
    // mysql://b85fe17b182973:32c1c5fa@us-cdbr-east-03.cleardb.com/heroku_7ccaa42c098c565?reconnect=true
    // define("DB_HOST", "us-cdbr-east-03.cleardb.com");
    // define("DB_USER", "b85fe17b182973");
    // define("DB_PASS", "32c1c5fa");
    // define("DB_NAME", "heroku_7ccaa42c098c565");

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);

    $conn = new mysqli($server, $username, $password, $db);

?>
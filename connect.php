<?php
$host = "ec2-3-233-100-43.compute-1.amazonaws.com";
$user = "wkdvdgpbgupgtt";
$password = "1ff360d7f13f866ed2a1f64b21c58c89e2394b64b4c7b7463ca5cca2f19aca19";
$dbname = "de162503s45r8m";
$port = "5432";

try {
    //Set DSN data source name
    $dsn = "pgsql:host=" . $host . ";port=" . $port . ";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";


    //create a pdo instance
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

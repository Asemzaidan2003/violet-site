<?php
// $servername = "sql7.freesqldatabase.com";
// $username = "sql7760275";
// $password = "11kVcv2QnS";
// $dbname = "sql7760275";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "violet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode([
        'status' => false,
        'message' => 'Connection failed: ' . $conn->connect_error,
        'data' => null
    ]));
}

$conn->set_charset("utf8");

?>

<?php
header("Content-Type: application/json");
require '../conn.php';

function getOil() {
    global $conn;
    
    $select_query = "SELECT * FROM oils";
    $result = mysqli_query($conn, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch all rows as an associative array
        $oils = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['status' => true, 'message' => 'Oils retrieved successfully', 'data' => $oils]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Oils not found', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        getOil();
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

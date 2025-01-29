<?php
header("Content-Type: application/json");
require '../conn.php';

function getOil($oil_id) {
    global $conn;

    if (empty($oil_id)) {
        echo json_encode(['status' => false, 'message' => 'Missing required field: oil_id', 'data' => null]);
        return;
    }

    $oil_id = mysqli_real_escape_string($conn, $oil_id);
    
    $select_query = "SELECT * FROM oils WHERE oil_id = '$oil_id'";

    $result = mysqli_query($conn, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $oil = mysqli_fetch_assoc($result);
        echo json_encode(['status' => true, 'message' => 'Oil retrieved successfully', 'data' => $oil]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Oil not found', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $oil_id = isset($_GET['oil_id']) ? $_GET['oil_id'] : null;
        getOil($oil_id);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

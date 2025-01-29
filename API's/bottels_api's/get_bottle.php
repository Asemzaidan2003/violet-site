<?php
header("Content-Type: application/json");
require '../conn.php';

function getBottle($bottle_id) {
    global $conn;

    if (empty($bottle_id)) {
        echo json_encode(['status' => false, 'message' => 'Missing required field', 'data' => null]);
        return;
    }

    $bottle_id = mysqli_real_escape_string($conn, $bottle_id);
    
    $select_query = "SELECT * FROM bottles WHERE bottle_id = '$bottle_id'";

    $result = mysqli_query($conn, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $bottle = mysqli_fetch_assoc($result);
        echo json_encode(['status' => true, 'message' => 'Bottle retrieved successfully', 'data' => $bottle]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Bottle not found', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $bottle_id = $_GET['bottle_id'] ?? null;
        getBottle($bottle_id);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

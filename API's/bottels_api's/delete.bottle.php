<?php
header("Content-Type: application/json");
require 'conn.php';

function deleteBottle($data) {
    global $conn;

    if (!isset($data['bottle_id'], $data['is_available'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $bottle_id = mysqli_real_escape_string($conn, $data['bottle_id']);
    $is_available = mysqli_real_escape_string($conn, $data['is_available']);

    $update_query = "UPDATE bottles 
                     SET is_available = '$is_available', updated_at = NOW() 
                     WHERE bottle_id = '$bottle_id'";

    if (mysqli_query($conn, $update_query)) {
        echo json_encode(['status' => true, 'message' => 'Bottle availability status updated', 'data' => null]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update bottle availability', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        deleteBottle($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

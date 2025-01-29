<?php
header("Content-Type: application/json");
require 'conn.php';

function deleteOil($data) {
    global $conn;

    if (!isset($data['oil_id'], $data['is_available'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $oil_id = mysqli_real_escape_string($conn, $data['oil_id']);
    $is_available = mysqli_real_escape_string($conn, $data['is_available']);

    $update_query = "UPDATE oils 
                     SET is_available = '$is_available', updated_at = NOW() 
                     WHERE oil_id = '$oil_id'";

    if (mysqli_query($conn, $update_query)) {
        echo json_encode(['status' => true, 'message' => 'Oil availability status updated', 'data' => null]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update oil availability', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        deleteOil($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

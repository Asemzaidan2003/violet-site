<?php
header("Content-Type: application/json");
require 'conn.php';

function deleteMaterial($data) {
    global $conn;

    if (!isset($data['material_id'], $data['is_available'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $material_id = mysqli_real_escape_string($conn, $data['material_id']);
    $is_available = mysqli_real_escape_string($conn, $data['is_available']);

    $update_query = "UPDATE materials 
                     SET is_available = '$is_available', updated_at = NOW() 
                     WHERE material_id = '$material_id'";

    if (mysqli_query($conn, $update_query)) {
        echo json_encode(['status' => true, 'message' => 'Material availability status updated', 'data' => null]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update material availability', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        deleteMaterial($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

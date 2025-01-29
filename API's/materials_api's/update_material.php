<?php
header("Content-Type: application/json");
require 'conn.php';

function updateMaterial($data) {
    global $conn;

    if (!isset($data['material_id'], $data['material_name'], $data['cost_per_ml'], $data['quantity_in_ml'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $material_id = mysqli_real_escape_string($conn, $data['material_id']);
    $material_name = mysqli_real_escape_string($conn, $data['material_name']);
    $cost_per_ml = mysqli_real_escape_string($conn, $data['cost_per_ml']);
    $quantity_in_ml = mysqli_real_escape_string($conn, $data['quantity_in_ml']);

    $update_query = "UPDATE materials 
                     SET material_name = '$material_name', cost_per_ml = '$cost_per_ml', quantity_in_ml = '$quantity_in_ml', updated_at = NOW() 
                     WHERE material_id = '$material_id'";

    if (mysqli_query($conn, $update_query)) {
        echo json_encode(['status' => true, 'message' => 'Material updated successfully', 'data' => null]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update material', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        updateMaterial($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

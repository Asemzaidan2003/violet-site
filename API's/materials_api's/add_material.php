<?php
header("Content-Type: application/json");
require 'conn.php';

function addMaterial($data) {
    global $conn;

    if (!isset($data['material_name'], $data['cost_per_ml'], $data['quantity_in_ml'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $material_name = mysqli_real_escape_string($conn, $data['material_name']);
    $cost_per_ml = mysqli_real_escape_string($conn, $data['cost_per_ml']);
    $quantity_in_ml = mysqli_real_escape_string($conn, $data['quantity_in_ml']);

    $insert_query = "INSERT INTO materials (material_name, cost_per_ml, quantity_in_ml, created_at, updated_at, is_available) 
                     VALUES ('$material_name', '$cost_per_ml', '$quantity_in_ml', NOW(), NOW(), 1)";

    if (mysqli_query($conn, $insert_query)) {
        $material_id = $conn->insert_id;
        echo json_encode(['status' => true, 'message' => 'Material added successfully', 'data' => ['material_id' => $material_id]]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to add material', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        addMaterial($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

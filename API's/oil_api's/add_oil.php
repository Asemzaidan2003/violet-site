<?php
header("Content-Type: application/json");
require '../conn.php';

function addOil($data) {
    global $conn;

    // Validate and sanitize inputs
    if (!isset($data['oil_name']) || !isset($data['cost_per_ml']) || !isset($data['quantity_in_ml'])) 
    {
        echo json_encode([
            'status' => false,
            'message' => 'Missing required fields',
            'data' => null
        ]);
        return;
    }

    $oil_name = mysqli_real_escape_string($conn, $data['oil_name']);
    $cost_per_ml = mysqli_real_escape_string($conn, $data['cost_per_ml']);
    $quantity_in_ml = mysqli_real_escape_string($conn, $data['quantity_in_ml']);
    $is_available = 1;

    // Insert into database
    $insert_query = "INSERT INTO Oils (oil_name, cost_per_ml, quantity_in_ml, is_available, created_at) VALUES ('$oil_name', '$cost_per_ml', '$quantity_in_ml', '$is_available', NOW())";
    if (mysqli_query($conn, $insert_query)) {
        echo json_encode([
            'status' => true,
            'message' => 'Oil added successfully',
            'data' => [
                'oil_id' => $conn->insert_id,
                'oil_name' => $oil_name,
                'cost_per_ml' => $cost_per_ml,
                'quantity_in_ml' => $quantity_in_ml,
                'is_available' => $is_available,
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Failed to add oil',
            'data' => null
        ]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        addOil($data);
    } else {
        http_response_code(405);
        echo json_encode([
            'status' => false,
            'message' => 'Method not allowed',
            'data' => null
        ]);
    }
}

handleRequest();
?>

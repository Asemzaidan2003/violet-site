<?php
header("Content-Type: application/json");
require '../conn.php';

function updateOil($data) {
    global $conn;

    // Validate and sanitize inputs
    if (!isset($data['oil_id']) || !isset($data['oil_name']) || !isset($data['cost_per_ml']) || !isset($data['quantity_in_ml'])) {
        echo json_encode([
            'status' => false,
            'message' => 'Missing required fields',
            'data' => null
        ]);
        return;
    }

    $oil_id = mysqli_real_escape_string($conn, $data['oil_id']);
    $oil_name = mysqli_real_escape_string($conn, $data['oil_name']);
    $cost_per_ml = mysqli_real_escape_string($conn, $data['cost_per_ml']);
    $quantity_in_ml = mysqli_real_escape_string($conn, $data['quantity_in_ml']);

    // Update database
    $update_query = "UPDATE Oils SET oil_name='$oil_name', cost_per_ml='$cost_per_ml', quantity_in_ml='$quantity_in_ml',  updated_at=NOW() WHERE oil_id='$oil_id'";
    if (mysqli_query($conn, $update_query)) {
        echo json_encode([
            'status' => true,
            'message' => 'Oil updated successfully',
            'data' => [
                'oil_id' => $oil_id,
                'oil_name' => $oil_name,
                'cost_per_ml' => $cost_per_ml,
                'quantity_in_ml' => $quantity_in_ml,
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Failed to update oil',
            'data' => null
        ]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        updateOil($data);
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

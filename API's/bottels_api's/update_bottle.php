<?php
header("Content-Type: application/json");
require '../conn.php';

function updateBottle($data) {
    global $conn;

    if (!isset($data['bottle_id'], $data['bottle_name'], $data['cost'], $data['quantity'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $bottle_id = mysqli_real_escape_string($conn, $data['bottle_id']);
    $bottle_name = mysqli_real_escape_string($conn, $data['bottle_name']);
    $cost = mysqli_real_escape_string($conn, $data['cost']);
    $quantity = mysqli_real_escape_string($conn, $data['quantity']);

    $update_query = "UPDATE bottles 
                     SET bottle_name = '$bottle_name', cost = '$cost', quantity = '$quantity', updated_at = NOW() 
                     WHERE bottle_id = '$bottle_id'";

    if (mysqli_query($conn, $update_query)) {
        echo json_encode(['status' => true, 'message' => 'Bottle updated successfully', 'data' => null]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update bottle', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        updateBottle($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

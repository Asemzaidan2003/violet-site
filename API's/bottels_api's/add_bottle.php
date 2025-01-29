<?php
header("Content-Type: application/json");
require '../conn.php';

function addBottle($data) {
    global $conn;

    if (!isset($data['bottle_name'], $data['cost'], $data['quantity'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $bottle_name = mysqli_real_escape_string($conn, $data['bottle_name']);
    $cost = mysqli_real_escape_string($conn, $data['cost']);
    $quantity = mysqli_real_escape_string($conn, $data['quantity']);

    $insert_query = "INSERT INTO bottles (bottle_name, cost, quantity, created_at, updated_at, is_available) 
                     VALUES ('$bottle_name', '$cost', '$quantity', NOW(), NOW(), 1)";

    if (mysqli_query($conn, $insert_query)) {
        $bottle_id = $conn->insert_id;
        echo json_encode(['status' => true, 'message' => 'Bottle added successfully', 'data' => ['bottle_id' => $bottle_id]]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to add bottle', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        addBottle($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

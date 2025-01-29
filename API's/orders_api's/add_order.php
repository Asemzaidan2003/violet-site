<?php
header("Content-Type: application/json");
require 'conn.php';

function addOrder($data) {
    global $conn;

    if (!isset($data['user_id'], $data['total_price'], $data['status'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $user_id = mysqli_real_escape_string($conn, $data['user_id']);
    $total_price = mysqli_real_escape_string($conn, $data['total_price']);
    $status = mysqli_real_escape_string($conn, $data['status']);

    $insert_query = "INSERT INTO orders (user_id, total_price, status, created_at, updated_at) 
                     VALUES ('$user_id', '$total_price', '$status', NOW(), NOW())";

    if (mysqli_query($conn, $insert_query)) {
        $order_id = $conn->insert_id;
        echo json_encode(['status' => true, 'message' => 'Order added successfully', 'data' => ['order_id' => $order_id]]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to add order', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        addOrder($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

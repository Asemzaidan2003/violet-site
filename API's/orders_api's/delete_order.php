<?php
header("Content-Type: application/json");
require 'conn.php';

function deleteOrder($data) {
    global $conn;

    if (!isset($data['order_id'], $data['is_available'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $order_id = mysqli_real_escape_string($conn, $data['order_id']);
    $is_available = mysqli_real_escape_string($conn, $data['is_available']);

    $update_query = "UPDATE orders 
                     SET status = '$is_available', updated_at = NOW() 
                     WHERE order_id = '$order_id'";

    if (mysqli_query($conn, $update_query)) {
        echo json_encode(['status' => true, 'message' => 'Order status updated', 'data' => null]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update order status', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        deleteOrder($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

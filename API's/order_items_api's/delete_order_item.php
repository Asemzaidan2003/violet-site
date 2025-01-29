<?php
header("Content-Type: application/json");
require 'conn.php';

function deleteOrderItem($data) {
    global $conn;

    if (!isset($data['order_item_id'], $data['is_available'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $order_item_id = mysqli_real_escape_string($conn, $data['order_item_id']);
    $is_available = mysqli_real_escape_string($conn, $data['is_available']);

    $update_query = "UPDATE order_items 
                     SET is_available = '$is_available', updated_at = NOW() 
                     WHERE order_item_id = '$order_item_id'";

    if (mysqli_query($conn, $update_query)) {
        echo json_encode(['status' => true, 'message' => 'Order item status updated', 'data' => null]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update order item status', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        deleteOrderItem($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

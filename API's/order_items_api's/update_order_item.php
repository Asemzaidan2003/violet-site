<?php
header("Content-Type: application/json");
require 'conn.php';

function updateOrderItem($data) {
    global $conn;

    if (!isset($data['order_item_id'], $data['quantity'], $data['price_at_purchase'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $order_item_id = mysqli_real_escape_string($conn, $data['order_item_id']);
    $quantity = mysqli_real_escape_string($conn, $data['quantity']);
    $price_at_purchase = mysqli_real_escape_string($conn, $data['price_at_purchase']);

    $update_query = "UPDATE order_items 
                     SET quantity = '$quantity', price_at_purchase = '$price_at_purchase', updated_at = NOW() 
                     WHERE order_item_id = '$order_item_id'";

    if (mysqli_query($conn, $update_query)) {
        echo json_encode(['status' => true, 'message' => 'Order item updated successfully', 'data' => null]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update order item', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents('php://input'), true);
        updateOrderItem($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

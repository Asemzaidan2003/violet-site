<?php
header("Content-Type: application/json");
require 'conn.php';

function addOrderItem($data) {
    global $conn;

    if (!isset($data['order_id'], $data['product_id'], $data['size'], $data['quantity'], $data['price_at_purchase'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $order_id = mysqli_real_escape_string($conn, $data['order_id']);
    $product_id = mysqli_real_escape_string($conn, $data['product_id']);
    $size = mysqli_real_escape_string($conn, $data['size']);
    $quantity = mysqli_real_escape_string($conn, $data['quantity']);
    $price_at_purchase = mysqli_real_escape_string($conn, $data['price_at_purchase']);

    $insert_query = "INSERT INTO order_items (order_id, product_id, size, quantity, price_at_purchase, created_at, updated_at) 
                     VALUES ('$order_id', '$product_id', '$size', '$quantity', '$price_at_purchase', NOW(), NOW())";

    if (mysqli_query($conn, $insert_query)) {
        $order_item_id = $conn->insert_id;
        echo json_encode(['status' => true, 'message' => 'Order item added successfully', 'data' => ['order_item_id' => $order_item_id]]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to add order item', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        addOrderItem($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

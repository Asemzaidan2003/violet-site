<?php
header("Content-Type: application/json");
require 'conn.php';

function getOrderItem($data) {
    global $conn;

    if (!isset($data['order_id'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required field: order_id', 'data' => null]);
        return;
    }

    $order_id = mysqli_real_escape_string($conn, $data['order_id']);
    
    $select_query = "SELECT * FROM order_items WHERE order_id = '$order_id'";

    $result = mysqli_query($conn, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $order_item = mysqli_fetch_assoc($result);
        echo json_encode(['status' => true, 'message' => 'Order item retrieved successfully', 'data' => $order_item]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Order item not found', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $data = json_decode(file_get_contents('php://input'), true);
        getOrderItem($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

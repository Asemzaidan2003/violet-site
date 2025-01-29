<?php
header("Content-Type: application/json");
require 'conn.php';

function getOrder($data) {
    global $conn;

    if (!isset($data['order_id'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required field: order_id', 'data' => null]);
        return;
    }

    $order_id = mysqli_real_escape_string($conn, $data['order_id']);
    
    $select_query = "SELECT * FROM orders WHERE order_id = '$order_id'";

    $result = mysqli_query($conn, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $order = mysqli_fetch_assoc($result);
        echo json_encode(['status' => true, 'message' => 'Order retrieved successfully', 'data' => $order]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Order not found', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $data = json_decode(file_get_contents('php://input'), true);
        getOrder($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

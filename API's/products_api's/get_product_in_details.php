<?php
header("Content-Type: application/json");
require 'conn.php';

function getProduct($data) {
    global $conn;

    if (!isset($data['product_id'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required field: product_id', 'data' => null]);
        return;
    }

    $product_id = mysqli_real_escape_string($conn, $data['product_id']);
    
    $select_query = "SELECT * FROM products WHERE product_id = '$product_id'";

    $result = mysqli_query($conn, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        echo json_encode(['status' => true, 'message' => 'Product retrieved successfully', 'data' => $product]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Product not found', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $data = json_decode(file_get_contents('php://input'), true);
        getProduct($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

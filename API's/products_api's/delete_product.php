<?php
header("Content-Type: application/json");
require 'conn.php';

function deleteProduct($data) {
    global $conn;

    if (!isset($data['product_id'], $data['is_available'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $product_id = mysqli_real_escape_string($conn, $data['product_id']);
    $is_available = mysqli_real_escape_string($conn, $data['is_available']);

    $update_query = "UPDATE products 
                     SET is_available = '$is_available', updated_at = NOW() 
                     WHERE product_id = '$product_id'";

    if (mysqli_query($conn, $update_query)) {
        echo json_encode(['status' => true, 'message' => 'Product status updated', 'data' => null]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update product status', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        deleteProduct($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

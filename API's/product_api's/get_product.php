<?php
header("Content-Type: application/json");
require '../conn.php';

function getProduct($product_id) {
    global $conn;

    if (empty($product_id)) {
        echo json_encode(['status' => false, 'message' => 'Missing required field', 'data' => null]);
        return;
    }

    $product_id = mysqli_real_escape_string($conn, $product_id);
    
    $select_query = "SELECT * FROM product WHERE product_id = '$product_id'";

    $result = mysqli_query($conn, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $Product = mysqli_fetch_assoc($result);
        echo json_encode(['status' => true, 'message' => 'Product retrieved successfully', 'data' => $Product]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Product not found', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $product_id = $_GET['product_id'] ?? null;
        getProduct($product_id);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

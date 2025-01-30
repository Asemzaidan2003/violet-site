<?php
header("Content-Type: application/json");
require '../conn.php';

function editProduct($data) {
    global $conn;

    $required_fields = ['product_id', 'product_name', 'product_price', 'product_size_list', 'product_gender', 'product_description', 'product_image_url'];
    $missing_fields = [];

    foreach ($required_fields as $field) {
        if (!isset($data[$field]) || empty($data[$field])) {
            $missing_fields[] = $field;
        }
    }

    if (count($missing_fields) > 0) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields: ' . implode(', ', $missing_fields), 'data' => null]);
        return;
    }

    $product_id = mysqli_real_escape_string($conn, $data['product_id']);
    $product_name = mysqli_real_escape_string($conn, $data['product_name']);
    $product_price = mysqli_real_escape_string($conn, $data['product_price']);
    $product_size_list = mysqli_real_escape_string($conn, $data['product_size_list']);
    $product_gender = mysqli_real_escape_string($conn, $data['product_gender']);
    $product_description = mysqli_real_escape_string($conn, $data['product_description']);
    $product_image_src = mysqli_real_escape_string($conn, $data['product_image_url']);

    // Check if the product name already exists, excluding the current product
    $check_query = "SELECT * FROM product WHERE product_name = '$product_name' AND product_id != '$product_id'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        echo json_encode(['status' => false, 'message' => 'Product name already exists', 'data' => null]);
        return;
    }

    // Proceed to update the product
    $update_query = "UPDATE product 
                     SET product_name = '$product_name', 
                         product_price = '$product_price', 
                         product_size_list = '$product_size_list', 
                         product_gender = '$product_gender',
                         product_description = '$product_description',
                         product_image_path = '$product_image_src'
                     WHERE product_id = '$product_id'";

    if (mysqli_query($conn, $update_query)) {
        echo json_encode(['status' => true, 'message' => 'Product updated successfully', 'data' => null]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update product', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        editProduct($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

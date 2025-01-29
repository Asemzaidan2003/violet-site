<?php
header("Content-Type: application/json");
require 'conn.php';

function updateProduct($data) {
    global $conn;

    if (!isset($data['product_id'], $data['oil_id'], $data['bottle_id'], $data['oil_cost'], $data['bottle_cost'], $data['material_cost'], $data['base_cost_price'], $data['sale_price'], $data['name'], $data['final_cost_price'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $product_id = mysqli_real_escape_string($conn, $data['product_id']);
    $oil_id = mysqli_real_escape_string($conn, $data['oil_id']);
    $bottle_id = mysqli_real_escape_string($conn, $data['bottle_id']);
    $oil_cost = mysqli_real_escape_string($conn, $data['oil_cost']);
    $bottle_cost = mysqli_real_escape_string($conn, $data['bottle_cost']);
    $material_cost = mysqli_real_escape_string($conn, $data['material_cost']);
    $base_cost_price = mysqli_real_escape_string($conn, $data['base_cost_price']);
    $sale_price = mysqli_real_escape_string($conn, $data['sale_price']);
    $name = mysqli_real_escape_string($conn, $data['name']);
    $final_cost_price = mysqli_real_escape_string($conn, $data['final_cost_price']);
    $image_path = isset($data['image_path']) ? mysqli_real_escape_string($conn, $data['image_path']) : null;

    $update_query = "UPDATE products 
                     SET oil_id = '$oil_id', bottle_id = '$bottle_id', oil_cost = '$oil_cost', bottle_cost = '$bottle_cost', material_cost = '$material_cost', 
                         base_cost_price = '$base_cost_price', sale_price = '$sale_price', name = '$name', final_cost_price = '$final_cost_price', 
                         image_path = '$image_path', updated_at = NOW() 
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
        updateProduct($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

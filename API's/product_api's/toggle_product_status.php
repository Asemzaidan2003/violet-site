<?php
header("Content-Type: application/json");
require '../conn.php';

function toggleProductStatus($data) {
    global $conn;

    if (!isset($data['product_id'], $data['is_active'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $product_id = mysqli_real_escape_string($conn, $data['product_id']);
    $is_active = mysqli_real_escape_string($conn, $data['is_active']);

    // Validate `is_active` to be either 1 or 0
    if ($is_active !== "1" && $is_active !== "0") {
        echo json_encode(['status' => false, 'message' => 'Invalid status value. Allowed values are 1 or 0.', 'data' => null]);
        return;
    }

    $update_query = "UPDATE product SET is_active = '$is_active' WHERE product_id = '$product_id'";

    if (mysqli_query($conn, $update_query)) {
        echo json_encode([
            'status' => true,
            'message' => 'Product status updated successfully',
            'data' => [
                'product_id' => $product_id,
                'new_status' => $is_active
            ]
        ]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update product status', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        toggleProductStatus($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

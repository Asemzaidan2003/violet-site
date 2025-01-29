<?php
header("Content-Type: application/json");
require 'conn.php';

function addReview($data) {
    global $conn;

    if (!isset($data['user_id'], $data['product_id'], $data['rating'], $data['review_text'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $user_id = mysqli_real_escape_string($conn, $data['user_id']);
    $product_id = mysqli_real_escape_string($conn, $data['product_id']);
    $rating = mysqli_real_escape_string($conn, $data['rating']);
    $review_text = mysqli_real_escape_string($conn, $data['review_text']);

    $insert_query = "INSERT INTO reviews (user_id, product_id, rating, review_text, created_at, updated_at) 
                     VALUES ('$user_id', '$product_id', '$rating', '$review_text', NOW(), NOW())";

    if (mysqli_query($conn, $insert_query)) {
        $review_id = $conn->insert_id;
        echo json_encode(['status' => true, 'message' => 'Review added successfully', 'data' => ['review_id' => $review_id]]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to add review', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        addReview($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

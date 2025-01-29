<?php
header("Content-Type: application/json");
require 'conn.php';

function updateReview($data) {
    global $conn;

    if (!isset($data['review_id'], $data['rating'], $data['review_text'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $review_id = mysqli_real_escape_string($conn, $data['review_id']);
    $rating = mysqli_real_escape_string($conn, $data['rating']);
    $review_text = mysqli_real_escape_string($conn, $data['review_text']);

    $update_query = "UPDATE reviews 
                     SET rating = '$rating', review_text = '$review_text', updated_at = NOW() 
                     WHERE review_id = '$review_id'";

    if (mysqli_query($conn, $update_query)) {
        echo json_encode(['status' => true, 'message' => 'Review updated successfully', 'data' => null]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update review', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        updateReview($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

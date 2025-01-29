<?php
header("Content-Type: application/json");
require 'conn.php';

function getReview($data) {
    global $conn;

    if (!isset($data['review_id'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required field: review_id', 'data' => null]);
        return;
    }

    $review_id = mysqli_real_escape_string($conn, $data['review_id']);
    
    $select_query = "SELECT * FROM reviews WHERE review_id = '$review_id'";

    $result = mysqli_query($conn, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $review = mysqli_fetch_assoc($result);
        echo json_encode(['status' => true, 'message' => 'Review retrieved successfully', 'data' => $review]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Review not found', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $data = json_decode(file_get_contents('php://input'), true);
        getReview($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

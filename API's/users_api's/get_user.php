<?php
header("Content-Type: application/json");
require 'conn.php';

function getUser($data) {
    global $conn;

    if (!isset($data['user_id'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required field: user_id', 'data' => null]);
        return;
    }

    $user_id = mysqli_real_escape_string($conn, $data['user_id']);
    
    $select_query = "SELECT * FROM users WHERE user_id = '$user_id'";

    $result = mysqli_query($conn, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        echo json_encode(['status' => true, 'message' => 'User retrieved successfully', 'data' => $user]);
    } else {
        echo json_encode(['status' => false, 'message' => 'User not found', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $data = json_decode(file_get_contents('php://input'), true);
        getUser($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

<?php
header("Content-Type: application/json");
require 'conn.php';

function updateUser($data) {
    global $conn;

    if (!isset($data['user_id'], $data['username'], $data['password_hash'], $data['email'], $data['role'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    $user_id = mysqli_real_escape_string($conn, $data['user_id']);
    $username = mysqli_real_escape_string($conn, $data['username']);
    $password_hash = mysqli_real_escape_string($conn, $data['password_hash']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    $role = mysqli_real_escape_string($conn, $data['role']);

    $update_query = "UPDATE users 
                     SET username = '$username', password_hash = '$password_hash', email = '$email', role = '$role', updated_at = NOW() 
                     WHERE user_id = '$user_id'";

    if (mysqli_query($conn, $update_query)) {
        echo json_encode(['status' => true, 'message' => 'User updated successfully', 'data' => null]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update user', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        updateUser($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

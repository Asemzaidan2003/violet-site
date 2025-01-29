<?php
header("Content-Type: application/json");
require 'conn.php';

function addUser($data) {
    global $conn;

    // Check for required fields
    if (!isset($data['username'], $data['password'], $data['email'], $data['role'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required fields', 'data' => null]);
        return;
    }

    // Sanitize inputs
    $username = mysqli_real_escape_string($conn, $data['username']);
    $password = $data['password']; // Raw password to hash
    $email = mysqli_real_escape_string($conn, $data['email']);
    $role = mysqli_real_escape_string($conn, $data['role']);

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $insert_query = "INSERT INTO users (username, password_hash, email, role, created_at, updated_at) 
                     VALUES ('$username', '$password_hash', '$email', '$role', NOW(), NOW())";

    if (mysqli_query($conn, $insert_query)) {
        $user_id = $conn->insert_id;
        echo json_encode(['status' => true, 'message' => 'User added successfully', 'data' => ['user_id' => $user_id]]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to add user', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        addUser($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

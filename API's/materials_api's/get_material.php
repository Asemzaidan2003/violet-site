<?php
header("Content-Type: application/json");
require 'conn.php';

function getMaterial($data) {
    global $conn;

    if (!isset($data['material_id'])) {
        echo json_encode(['status' => false, 'message' => 'Missing required field: material_id', 'data' => null]);
        return;
    }

    $material_id = mysqli_real_escape_string($conn, $data['material_id']);
    
    $select_query = "SELECT * FROM materials WHERE material_id = '$material_id'";

    $result = mysqli_query($conn, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $material = mysqli_fetch_assoc($result);
        echo json_encode(['status' => true, 'message' => 'Material retrieved successfully', 'data' => $material]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Material not found', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $data = json_decode(file_get_contents('php://input'), true);
        getMaterial($data);
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

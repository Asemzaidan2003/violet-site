<?php
header("Content-Type: application/json");
require '../conn.php';

function getProducts() {
    global $conn;
    
    $select_query = "SELECT * FROM product ORDER BY quantity_sold LIMIT 3";
    $result = mysqli_query($conn, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch all rows as an associative array
        $oils = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['status' => true, 'message' => 'Top 3 retrieved successfully', 'data' => $oils]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Top 3 not found', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        getProducts();
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

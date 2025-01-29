<?php
header("Content-Type: application/json");
require '../conn.php';

function getProducts() {
    global $conn;
    
    $select_query = "SELECT * FROM product";
    $result = mysqli_query($conn, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch all rows as an associative array
        $oils = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['status' => true, 'message' => 'Oils retrieved successfully', 'data' => $oils]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Oils not found', 'data' => null]);
    }
}

function getProductsByGender($productGender) {
    global $conn;
    
    $select_query = "SELECT * FROM product WHERE product_gender = '$productGender'";
    $result = mysqli_query($conn, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch all rows as an associative array
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode(['status' => true, 'message' => 'Products retrieved successfully', 'data' => $products]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Products not found', 'data' => null]);
    }
}

function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $productGender = isset($_GET['product_gender']) ? $_GET['product_gender'] : null;
        if($productGender == null){
            getProducts();
        }else{
            getProductsByGender($productGender);
        }
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

<?php
header("Content-Type: application/json");
require '../conn.php';

function addBottle($data) {
    global $conn;

    $product_name = mysqli_real_escape_string($conn, $data['product_name']);
    $product_size_list = mysqli_real_escape_string($conn, $data['product_size_list']);
    $product_price = mysqli_real_escape_string($conn, $data['product_price']);
    $product_gender = mysqli_real_escape_string($conn, $data['product_gender']);
    $product_description = mysqli_real_escape_string($conn, $data['product_description']);
    $product_image_url = mysqli_real_escape_string($conn, $data['product_image_url']);

    // Insert the new product
    $insert_query = "INSERT INTO product (product_name, product_size_list, product_price, product_image_path, product_gender, product_description) 
                     VALUES ('$product_name', '$product_size_list', '$product_price', '$product_image_url', '$product_gender', '$product_description')";

    if (mysqli_query($conn, $insert_query)) {
        $product_id = $conn->insert_id;
        echo json_encode(['status' => true, 'message' => 'Product added successfully', 'data' => ['product_id' => $product_id]]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to add product', 'data' => null]);
    }
}

function handleRequest() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_size_list = $_POST['product_size_list'];
        $product_gender = $_POST['product_gender'];
        $product_description = $_POST['product_description'];
        $product_image_url = $_POST['product_image_url']; 

        // Check if the product name already exists
        $product_name_escaped = mysqli_real_escape_string($conn, $product_name);
        $check_query = "SELECT * FROM product WHERE product_name = '$product_name_escaped'";
        $result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($result) > 0) {
            echo json_encode(['status' => false, 'message' => 'Product name already exists', 'data' => null]);
            return;
        }

        // Validate image source
        if (!empty($product_image_url)) {
            $data = [
                'product_name' => $product_name,
                'product_size_list' => $product_size_list,
                'product_price' => $product_price,
                'product_gender' => $product_gender,
                'product_description' => $product_description,
                'product_image_url' => $product_image_url
            ];
            addBottle($data);
        } else {
            echo json_encode(['status' => false, 'message' => 'Image source is required', 'data' => null]);
        }
    } else {
        http_response_code(405);
        echo json_encode(['status' => false, 'message' => 'Method not allowed', 'data' => null]);
    }
}

handleRequest();
?>

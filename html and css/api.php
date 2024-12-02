<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add product to cart
if ($_POST['action'] == 'addToCart') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $sql = "INSERT INTO cart (product_id, quantity) VALUES ('$product_id', '$quantity')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add to cart']);
    }
}

// Remove product from cart
if ($_POST['action'] == 'removeFromCart') {
    $product_id = $_POST['product_id'];
    $sql = "DELETE FROM cart WHERE product_id = '$product_id'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to remove from cart']);
    }
}

// Get cart items from the database
if ($_GET['action'] == 'getCart') {
    $sql = "SELECT * FROM cart JOIN products ON cart.product_id = products.id";
    $result = $conn->

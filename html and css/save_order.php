<?php
header("Content-Type: application/json");

// Start session to check if the user is logged in
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]);
    exit();
}

// Retrieve order data from the request (JSON)
$data = json_decode(file_get_contents("php://input"), true);

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // Get user ID from session
    $cart = $data['cart']; // Retrieve cart data
    $total_price = $data['total_price']; // Retrieve total price from the request

    // Convert cart array to JSON for storage
    $order_details = json_encode($cart);

    // Insert order into database
    $sql = "INSERT INTO orders (user_id, order_details, total_price) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isd", $user_id, $order_details, $total_price); // Bind parameters

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Order saved successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Error saving order: " . $conn->error]);
    }

    $stmt->close();
} else {
    // If the user is not logged in, send an error message
    echo json_encode(["success" => false, "message" => "Please log in to place an order."]);
}

// Close the database connection
$conn->close();
?>

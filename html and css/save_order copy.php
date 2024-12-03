<?php
header("Content-Type: application/json");

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]);
    exit();
}

// Retrieve order data from the request
$data = json_decode(file_get_contents("php://input"), true);



$user_id = $data['user_id']; // Replace with actual user ID from session
$cart = $data['cart'];
$total_price = $data['total_price'];

// Convert cart array to JSON for storage
$order_details = json_encode($cart);

// Insert order into database
$sql = "INSERT INTO orders (user_id, order_details, total_price) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isd", $user_id, $order_details, $total_price);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Order saved successfully."]);
} else {
    echo json_encode(["success" => false, "message" => "Error saving order: " . $conn->error]);
}

$stmt->close();
$conn->close();


?>

<?php
header('Content-Type: application/json'); //json


$host = "localhost";
$user = "root";
$password = "";
$dbname = "coffee_db";

// this creates a connection
$conn = new mysqli($host, $user, $password, $dbname);

// lets check if theres connection
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit;
}


// here we handle post request, check natin kung post ba yung tinatanggap
if ($_SERVER['REQUEST_METHOD'] === 'POST') {        
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

// check kung may laman
if (empty($username) || empty($email) || empty($password)) {
    echo json_encode(["error" => "All fields are required!"]);
    exit;
} else { 
    // secure password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // sql statement preparation
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?,?,?)");
    if ($stmt === false) {
        echo json_encode(["error" => "Theres an error preparing the statement" . $conn->error]);
        exit;
    }
    //bind parameters to query
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    // execute query then send response
    if ($stmt->execute()) {
        echo json_encode(["message" => "user is registered successfuly"]);
    } else {
        echo json_encode(["error" => "Error: " . $stmt->error]);
    }
    $stmt->close();

    }

}



?>
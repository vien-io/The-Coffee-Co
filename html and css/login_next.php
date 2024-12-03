<?php
header('Content-Type: application/json'); //json

$host = "localhost";
$user = "root";
$password = "";
$dbname = "coffee_db";

// create the connection
$conn = new mysqli($host, $user, $password, $dbname);

// check conn
if ($conn->connect_error){
    echo json_encode(["error"=> "Connection Failed!: " . $conn->connect_error]);
    exit;
}

// post request handling
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    // validate inputs
    if (empty($email) || empty($password)){
        echo json_encode(["error"=> "Both email and pass are required!"]);
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["error"=> "Invalid email Format!"]);
        exit;
    }

    // prepare sql statement
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    if ($stmt === false) {
        echo json_encode(["error"=> "Error preparing the statement!" . $conn->error]);
        exit;
    }

    //bind params and exe
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // fetch
    $result = $stmt->get_result();
    if ($result->num_rows === 0){
        echo json_encode(["error"=> "invalid email or pass"]);
    }

    $user = $result->fetch_assoc(); //get user details

    // verify pass
    if (password_verify($password, $user['password'])) {
        //successful login
        echo json_encode(["message"=> "Login success",
        "user" => [
            "id" => $user['id'],
            "username" => $user['username'],
            "email" => $email
        ]
        ]);
    } else {
        // incorrect
        echo json_encode(["error" => "password aint right"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid request method. Only POST is allowed."]);
}
    



$conn-> close();
?>
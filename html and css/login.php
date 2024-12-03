<?php
header('Content-Type: application/json'); // json

$host = "localhost";
$user = "root";
$password = "";
$dbname = "coffee_db";

// Create the connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit;
}

// Post request handling
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; 

    // Validate inputs
    if (empty($email) || empty($password)) {
        echo json_encode(["error" => "Both email and password are required!"]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["error" => "Invalid email format!"]);
        exit;
    }

    // Prepare SQL statement to fetch user
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    if ($stmt === false) {
        echo json_encode(["error" => "Error preparing the statement: " . $conn->error]);
        exit;
    }

    // Bind parameters and execute
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Fetch result
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        echo json_encode(["error" => "Invalid email or password!"]);
        exit;
    }

    $user = $result->fetch_assoc(); // Get user details

    // Verify the password
    if (password_verify($password, $user['password'])) {
        // Successful login
        session_start(); // Start the session
        $_SESSION['user_id'] = $user['id']; // Store the user's ID in session
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $email;

        echo json_encode([
            "message" => "Login successful!",
            "user" => [
                "id" => $user['id'],
                "username" => $user['username'],
                "email" => $email
            ]
        ]);

        error_log("User ID: " . $_SESSION['user_id']); 
    error_log("Username: " . $_SESSION['username']);
    error_log("Email: " . $_SESSION['email']);

    } else {
        // Incorrect password
        echo json_encode(["error" => "Invalid email or password!"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid request method. Only POST is allowed."]);
}

$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "connect_seed";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST["username"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = $conn->real_escape_string($_POST["email"]);
    $location = $conn->real_escape_string($_POST["location"]);
    
    // Check if username already exists
    $checkQuery = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose a different username.";
    } else {
        // Insert new user
        $sql = "INSERT INTO users (username, password, email, location) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $password, $email, $location);
        
        if ($stmt->execute()) {
            echo "Registration successful!";
            // Redirect to login page
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    $stmt->close();
}

$conn->close();
?>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "connect_seed";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $_POST["password"];
    
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            
            // Check if the user is the admin
            if ($username === "admin") {
                header("Location: admin_dashboard.php"); // Redirect to admin dashboard
            } else {
                header("Location: seeds.php"); // Redirect to user dashboard
            }
            exit();
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid username or password";
    }
    $stmt->close();
}

$conn->close();
?>

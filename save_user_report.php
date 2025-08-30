<?php
header("Content-Type: application/json");

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "waste_management";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed"]));
}

// Retrieve form data
$title = isset($_POST['title']) ? $conn->real_escape_string($_POST['title']) : '';
$description = isset($_POST['description']) ? $conn->real_escape_string($_POST['description']) : '';

if (empty($title) || empty($description)) {
    echo json_encode(["success" => false, "message" => "All fields are required"]);
    exit;
}

// Insert into database
$sql = "INSERT INTO user_reports (title, description) VALUES ('$title', '$description')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Report submitted successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
}

// Close the connection
$conn->close();
?>

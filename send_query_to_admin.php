<?php
$host = "localhost";
$port = "3308";
$username = "root";
$password = "";
$database = "hospital_management_system";

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$query = $_POST['query'];

$sql = "INSERT INTO admin_queries (name, email, query) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $query);

if ($stmt->execute()) {
    echo "Query submitted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

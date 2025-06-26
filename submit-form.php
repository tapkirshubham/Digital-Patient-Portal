<?php
// Database connection variables
$host = "localhost";
$port = 3308; // MySQL port
$username = "root"; // change if needed
$password = ""; // change if needed
$dbname = "hospital_management_system";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize input data
$full_name = htmlspecialchars($_POST['full_name']);
$email_id = htmlspecialchars($_POST['email_id']);
$contact_no = htmlspecialchars($_POST['contact_no']);
$query_type = htmlspecialchars($_POST['query_type']);
$comment = htmlspecialchars($_POST['comment']);

// Insert data into the database
$sql = "INSERT INTO contact_queries (full_name, email_id, contact_no, query_type, comment)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $full_name, $email_id, $contact_no, $query_type, $comment);

if ($stmt->execute()) {
    echo "<script>alert('Query sent successfully!'); window.location.href='contactus.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

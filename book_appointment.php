<?php
// Database configuration
$host = "localhost";
$port = "3308";
$username = "root";
$password = ""; // default XAMPP password
$database = "hospital_management_system";

// Create connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$doctor = $_POST['doctor'];

// Prepare SQL query
$sql = "INSERT INTO appointments (name, date, time, doctor) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $date, $time, $doctor);

// Execute and give response
if ($stmt->execute()) {
    echo "<h2>Appointment Booked Successfully!</h2>";
    echo "<p>Name: $name</p>";
    echo "<p>Date: $date</p>";
    echo "<p>Time: $time</p>";
    echo "<p>Doctor: $doctor</p>";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>

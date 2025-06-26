<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "hospital_management_system";
$port = "3308";

$conn = new mysqli($host, $user, $password, $db, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$doctor_name = isset($_POST['doctor_name']) ? $_POST['doctor_name'] : '';
$query = isset($_POST['query']) ? $_POST['query'] : '';

echo "Doctor Name: $doctor_name <br>";
echo "Query: $query <br>";

if (empty($doctor_name) || empty($query)) {
    die("Doctor name or query is missing.");
}

$sql = "INSERT INTO doctor_queries (doctor_name, query) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ss", $doctor_name, $query);
if ($stmt->execute()) {
    echo "Query submitted successfully.";
} else {
    echo "Error submitting query: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

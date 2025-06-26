<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "hospital_management_system";
$port = "3308"; // Change to your port if different

$conn = new mysqli($host, $user, $password, $db, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form values
    $doctor_name = $_POST['doctor_name'];
    $specialty = $_POST['specialty'];
    $timings = $_POST['timings'];
    $days = $_POST['days'];

    // Insert the doctor details into the database
    $sql = "INSERT INTO doctors (doctor_name, specialty, timings, days) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $doctor_name, $specialty, $timings, $days);
        $stmt->execute();
        $stmt->close();

        echo "Doctor added successfully!";
    } else {
        echo "Error adding doctor: " . $conn->error;
    }

    $conn->close();
}
?>

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

$patientName = $_POST['patient_name'];
$file = $_FILES['prescription'];

if ($file['error'] === 0 && $file['type'] === 'application/pdf') {
    $targetDir = "prescriptions/";
    $fileName = uniqid() . "_" . basename($file['name']);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        $stmt = $conn->prepare("INSERT INTO prescriptions (patient_name, file_name) VALUES (?, ?)");
        $stmt->bind_param("ss", $patientName, $fileName);
        $stmt->execute();
        echo "Prescription uploaded successfully.";
        $stmt->close();
    } else {
        echo "Failed to move uploaded file.";
    }
} else {
    echo "Please upload a valid PDF file.";
}
$conn->close();
?>

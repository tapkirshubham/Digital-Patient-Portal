<?php
$host = "localhost";
$port = "3308";
$username = "root";
$password = ""; // change if you have a password
$dbname = "hospital_management_system";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$patientName = $_POST['patientName'];
$country = $_POST['country'];
$concern = $_POST['concern'];
$contact = $_POST['contact'];
$email = $_POST['email'];

// Handle file upload
$report = "";
if (isset($_FILES['report']) && $_FILES['report']['error'] == 0) {
    $uploadDir = "uploads/";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $report = $uploadDir . basename($_FILES["report"]["name"]);
    move_uploaded_file($_FILES["report"]["tmp_name"], $report);
}

// Insert into database
$sql = "INSERT INTO international_enquiries (patient_name, country, medical_concern, report_path, contact, email)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $patientName, $country, $concern, $report, $contact, $email);

if ($stmt->execute()) {
    echo "<script>alert('Form Submitted Successfully'); window.location.href='InternationalPatient.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

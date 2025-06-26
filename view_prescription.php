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

$sql = "SELECT patient_name, file_name FROM prescriptions ORDER BY upload_date DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $filePath = "prescriptions/" . $row['file_name'];
    echo "<h2>Prescription for " . htmlspecialchars($row['patient_name']) . "</h2>";
    echo "<embed src='$filePath' width='100%' height='500px' type='application/pdf'>";
    echo "<a href='$filePath' download>Download Prescription</a>";
} else {
    echo "No prescriptions available.";
}

$conn->close();
?>

<?php
$host = "localhost";
$port = "3308";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = new mysqli($host, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT patient_name, file_name, uploaded_on FROM patient_reports ORDER BY uploaded_on DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fileUrl = "uploads/" . htmlspecialchars($row['file_name']);
        $patientName = htmlspecialchars($row['patient_name']);
        echo "<div class='report'>";
        echo "<p><strong>Patient:</strong> $patientName</p>";
        echo "<a href='$fileUrl' target='_blank'>View Report</a>";
        echo "<a href='$fileUrl' download>Download Report</a>";
        echo "</div>";

    }
} else {
    echo "<p>No reports found.</p>";
}

$conn->close();
?>

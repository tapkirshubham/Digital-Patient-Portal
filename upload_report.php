<?php
$host = "localhost";
$port = "3308";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if file is uploaded
if (isset($_FILES['reportFile']) && isset($_POST['patientName'])) {
    $patientName = $_POST['patientName'];
    $fileName = basename($_FILES['reportFile']['name']);
    $targetDir = "uploads/";
    $targetFile = $targetDir . $fileName;

    // Create upload folder if not exists
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Move file to server
    if (move_uploaded_file($_FILES['reportFile']['tmp_name'], $targetFile)) {
        // Insert file info into DB
        $stmt = $conn->prepare("INSERT INTO patient_reports (patient_name, file_name) VALUES (?, ?)");
        $stmt->bind_param("ss", $patientName, $fileName);

        if ($stmt->execute()) {
            echo "<h2 style='text-align:center;'>✅ Report uploaded successfully!</h2>";
            echo "<p style='text-align:center;'>Our doctor will contact you soon.</p>";
            echo "<div style='text-align:center;'><a href='patient.html'>⬅️ Go Back</a></div>";
        } else {
            echo "Database Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "❌ Error uploading the file.";
    }
} else {
    echo "❗ Patient name or report file is missing.";
}

$conn->close();
?>

<?php
$host = "localhost";
$port = "3308";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Corrected query using actual column names
$sql = "SELECT name, subject, query FROM patient_to_doc_query";
$result = $conn->query($sql);

// Check for errors
if (!$result) {
    die("SQL Error: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $patient = htmlspecialchars($row['name']);
        $subject = htmlspecialchars($row['subject']);
        $queryText = htmlspecialchars($row['query']);

        echo "<div class='query'>";
        echo "<p><strong>Patient:</strong> $patient</p>";
        echo "<p><strong>Subject:</strong> $subject</p>";
        echo "<p><strong>Query:</strong> $queryText</p>";
        echo "</div><hr>";
    }
} else {
    echo "<p>No patient queries available.</p>";
}

$conn->close();
?>

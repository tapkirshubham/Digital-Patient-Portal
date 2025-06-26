<?php
$conn = new mysqli("localhost", "root", "", "hospital_management_system","3308");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM doctor_queries ORDER BY id DESC";
$result = $conn->query($sql);

// Check if query was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Display results
while ($row = $result->fetch_assoc()) {
    echo "<div class='query'>";
    echo "<p><strong>Doctor:</strong> " . htmlspecialchars($row['doctor_name']) . "</p>";
    echo "<p><strong>Query:</strong> " . htmlspecialchars($row['query']) . "</p>";
    echo "</div>";
}

$conn->close();
?>


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

$sql = "SELECT name, email, query, submitted_at FROM admin_queries ORDER BY submitted_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='query'>";
        echo "<p><strong>Patient:</strong> " . htmlspecialchars($row['name']) . " (" . htmlspecialchars($row['email']) . ")</p>";
        echo "<p><strong>Query:</strong> " . nl2br(htmlspecialchars($row['query'])) . "</p>";
        echo "<p><em>Submitted: " . $row['submitted_at'] . "</em></p>";
        echo "</div><hr>";
    }
} else {
    echo "<p>No queries yet.</p>";
}

$conn->close();
?>

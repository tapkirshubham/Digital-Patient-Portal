<?php
$host = "localhost";
$port = "3308";
$username = "root";
$password = "";
$database = "hospital_management_system";

// Create connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all appointments
$sql = "SELECT name, date, time, doctor FROM appointments ORDER BY date ASC, time ASC";
$result = $conn->query($sql);

// Check if appointments exist
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = htmlspecialchars($row['name']);
        $date = htmlspecialchars($row['date']);
        $time = htmlspecialchars($row['time']);
        $doctor = htmlspecialchars($row['doctor']);

        echo "<div class='appointment'>";
        echo "<p><strong>Patient:</strong> $name</p>";
        echo "<p><strong>Date:</strong> $date</p>";
        echo "<p><strong>Time:</strong> $time</p>";
        echo "<p><strong>Doctor:</strong> $doctor</p>";
        // echo "<button class='accept'>Accept</button>";
        // echo "<button class='reject'>Reject</button>";
        echo "</div><hr>";
    }
} else {
    echo "<p>No appointments scheduled.</p>";
}

$conn->close();
?>

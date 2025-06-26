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

// Collect form data
$patientName=$_POST['patientName'];
$subject_=$_POST['subject'];
$query=$_POST['query'];

// Insert into database
$sql = "INSERT INTO patient_to_doc_query (name, subject, query)
        VALUES ('$patientName', '$subject_', '$query')";


if ($conn->query($sql) === TRUE) {
    echo "<h2 style='text-align:center;'>✅ Your query has been recorded!</h2>";
    echo "<p style='text-align:center;'>Our doctor will provide you further solution.</p>";
    echo "<div style='text-align:center;'><a href='patient.html'>⬅️ Go Back</a></div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// $stmt = $conn->prepare($sql);
// $stmt->bind_param("sss", $patientName, $subject_, $query);

// if ($stmt->execute()) {
//     echo "<script>alert('Query Submitted Successfully'); window.location.href='patient.html';</script>";
// } else {
//     echo "Error: " . $stmt->error;
// }

// $stmt->close();
$conn->close();
?>
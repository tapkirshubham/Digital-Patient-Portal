<?php
// Database config
$host = "localhost";
$username = "root";
$password = "";
$database = "hospital_management_system"; // change to your actual DB name
$port = 3308; // because your MySQL runs on 3308

// Create connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$patient_id = $_POST['patient_id'];
$patient_name = $_POST['patient_name'];
$amount = $_POST['amount'];
$card_number = $_POST['card_number'];
$expiry_date = $_POST['expiry_date'];
$cvv = $_POST['cvv'];

// Insert into database
$sql = "INSERT INTO payments (patient_id, patient_name, amount, card_number, expiry_date, cvv)
        VALUES ('$patient_id', '$patient_name', '$amount', '$card_number', '$expiry_date', '$cvv')";

if ($conn->query($sql) === TRUE) {
    echo "<h2 style='text-align:center;'>✅ Thank you for your payment!</h2>";
    echo "<p style='text-align:center;'>Your transaction has been successfully recorded.</p>";
    echo "<div style='text-align:center;'><a href='onlinepayment.html'>⬅️ Go Back</a></div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["doctor_id"])) {
        $doctorId = intval($_POST["doctor_id"]);

        // Connect to database
        $conn = new mysqli("localhost", "root", "", "hospital_management_system", "3308");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Delete doctor with matching id
        $sql = "DELETE FROM doctors WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $doctorId);

        if ($stmt->execute()) {
            echo "<script>alert('Doctor removed successfully.'); window.location.href='admin.php';</script>";
        } else {
            echo "<script>alert('Error removing doctor.'); window.location.href='admin.php';</script>";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "<script>alert('No doctor selected.'); window.location.href='admin.php';</script>";
    }
} else {
    header("Location: admin.php");
    exit();
}

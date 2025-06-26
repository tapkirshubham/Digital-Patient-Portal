<?php
// Database Connection
$host = 'localhost';
$db = 'hospital_management_system';
$user = 'root'; // or your mysql username
$pass = '';     // your mysql password if any
$port = 3308;   // your mysql port

$conn = new mysqli($host, $user, $pass, $db, $port);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ------------------------
// Handle Add Doctor
// ------------------------
if (isset($_POST['add_doctor'])) {
    $doctorName = $_POST['doctor-name'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['patient_password'], PASSWORD_DEFAULT); // Secure Password

    $sql = "INSERT INTO doctors (name, specialization, email, phone, password)
            VALUES ('$doctorName', '$specialization', '$email', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Doctor Added Successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// ------------------------
// Handle Add Patient
// ------------------------
if (isset($_POST['add_patient'])) {
    $patientName = $_POST['patient-name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $patientID = $_POST['patient_id'];
    $password = password_hash($_POST['patient_password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO patients (patient_id, name, age, email, phone, password)
            VALUES ('$patientID', '$patientName', '$age', '$email', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Patient Added Successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// ------------------------
// Handle Send Message to Patient
// ------------------------
if (isset($_POST['send_message_patient'])) {
    $patientID = $_POST['patient_id'];
    $message = $_POST['message'];

    $sql = "INSERT INTO patient_messages (patient_id, message)
            VALUES ('$patientID', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message Sent to Patient.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// ------------------------
// Handle Send Message to Doctor
// ------------------------
if (isset($_POST['send_message_doctor'])) {
    $doctorID = $_POST['doctor_id']; // use doctor id or email
    $message = $_POST['message'];

    $sql = "INSERT INTO doctor_messages (doctor_id, message)
            VALUES ('$doctorID', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message Sent to Doctor.";
    } else {
        echo "Error: " . $conn->error;
    }
}
// -----------------------------------
// Remove Doctor Section
if (isset($_POST['remove_doctor'])) {
    $doctor_id = $_POST['doctor_id'] ?? '';

    if (!empty($doctor_id)) {
        $sql = "DELETE FROM doctors WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $doctor_id);

        if ($stmt->execute()) {
            echo "Doctor removed successfully!";
            header("refresh:2; url=admin_dashboard.html");
            exit();
        } else {
            echo "Error removing doctor: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Doctor ID is required to remove.";
    }
}

// -----------------------------------
// Remove Patient Section
if (isset($_POST['remove_patient'])) {
    $patient_id = $_POST['patient_id'] ?? '';

    if (!empty($patient_id)) {
        $sql = "DELETE FROM patients WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $patient_id);

        if ($stmt->execute()) {
            echo "Patient removed successfully!";
            header("refresh:2; url=admin_dashboard.html");
            exit();
        } else {
            echo "Error removing patient: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Patient ID is required to remove.";
    }
}

$conn->close();
?>

<?php
// Get role and id from the form
$role = $_POST['role'];
$id = $_POST['id'];

// Expected IDs for each role
$validIds = [
    'doctor' => 'doctor123',
    'patient' => 'patient123',
    'admin' => 'admin123'
];

// Redirection pages for each role
$redirects = [
    'doctor' => 'doctor-login.php',
    'patient' => 'patient.html',
    'admin' => 'admin.php'
];

// Check if role is valid and ID matches
if (isset($validIds[$role]) && $id === $validIds[$role]) {
    // Redirect to correct page
    header("Location: " . $redirects[$role]);
    exit();
} else {
    // Show popup for invalid details
    echo "
    <script>
        alert('Invalid details');
        window.location.href = 'login.html';
    </script>
    ";
}
?>

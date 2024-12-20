<?php
// Database connection
$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "voluntech";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO donations (event_name, location, start_date, end_date, time, organization, donations) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssi", $event_name, $location, $start_date, $end_date, $time, $organization, $donations);

// Set parameters and execute
$event_name = $_POST['event_name'];
$location = $_POST['location'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$time = $_POST['time'];
$organization = $_POST['organization'];
$donations = $_POST['donations'];

if ($stmt->execute()) {
    header("Location: thank_you.php");
exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
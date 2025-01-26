<?php
include 'includes/db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$event_id = $_GET['event_id'] ?? 0;

$query = "INSERT INTO Event_Registrations (event_id, user_id, registration_date) VALUES (?, ?, NOW())";
$stmt = $conn->prepare($query);
$stmt->execute([$event_id, $user_id]);

echo "Registered successfully!";
?>

<?php
include 'includes/db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM Event_Registrations INNER JOIN Events ON Event_Registrations.event_id = Events.id WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$user_id]);
$registrations = $stmt->fetchAll();
?>

<h1>Your Dashboard</h1>
<ul>
    <?php foreach ($registrations as $registration): ?>
        <li><?= htmlspecialchars($registration['name']) ?> - <?= htmlspecialchars($registration['location']) ?></li>
    <?php endforeach; ?>
</ul>

<?php
// Include the database connection and header file
include 'includes/db_connect.php';
include 'includes/header.php';

// Get the activity name from the URL parameter
$activity_name = $_GET['activity_name'];

// Fetch activity details from the database based on the activity name
$query = "SELECT * FROM Activities WHERE name = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$activity_name]);
$activity = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Details</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <section class="activity-details-section">
        <h2>Activity Details</h2>

        <div class="activity-detail-card">
            <img src="assets/images/<?= htmlspecialchars($activity['image']) ?>" alt="<?= htmlspecialchars($activity['name']) ?>">
            <div class="activity-detail-info">
                <h3><?= htmlspecialchars($activity['name']) ?></h3>
                <p><strong>Location:</strong> <?= htmlspecialchars($activity['location']) ?></p>
                <p><strong>Time:</strong> <?= htmlspecialchars($activity['time']) ?></p>
                <p><strong>Description:</strong> <?= htmlspecialchars($activity['description']) ?></p>
            </div>
        </div>
    </section>

    <?php
    // Include the footer file
    include 'includes/footer.php';
    ?>
</body>
</html>

<?php
// Include the database connection and header file
include 'includes/db_connect.php';
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALM WAVES</title>
    <link rel="stylesheet" href="assets/css/index.css"> <!-- Link to CSS -->
    <style>
        #about-page {
            background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent background for readability */
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Main Content -->
    <section id="about-page">
        <h1>Welcome to Calm Waves</h1>
        <p style="color: black;">Your one-stop destination for activities that bring peace and joy to your mind and soul.</p>
        
        <!-- Search Bar -->
        <form action="activities.php" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search for activities or events..." required>
            <button type="submit">Search</button>
        </form>
    </section>

    <!-- Highlighted Activities Section -->
    <section id="about-page">
        <h2>Explore Popular Activities</h2>
        <div class="activities-grid">
            <?php
            // Fetch popular activities from the database (example query)
            $query = "SELECT * FROM Activities LIMIT 4"; // Adjust the number of items as needed
            $stmt = $conn->query($query);
            $activities = $stmt->fetchAll();

            foreach ($activities as $activity):
            ?>
            <div class="card">
                <h3><?= htmlspecialchars($activity['name']) ?></h3>
                <p><?= htmlspecialchars($activity['description']) ?></p>
                <a href="activity_detail.php?activity_name=<?= urlencode($activity['name']) ?>">View Details</a>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php
    // Include the footer file
    include 'includes/footer.php';
    ?>

</body>
</html>

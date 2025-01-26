<?php
// Include the header
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities</title>
    <link rel="stylesheet" href="assets/css/styles.css"> <!-- Link to CSS -->
</head>
<body>
    <section class="activities-section">
        <h2>Our Activities</h2>

        <div class="activities-grid">
            <!-- Yoga -->
            <div class="activity-card">
                <img src="assets/images/yoga.jpg" alt="Yoga">
                <div class="activity-details">
                    <h3>Yoga</h3>
                    <a href="activity_detail.php?activity_name=Yoga" class="view-details">View Details</a>
                </div>
            </div>

            <!-- Music Therapy -->
            <div class="activity-card">
                <img src="assets/images/music_therapy.jpg" alt="Music Therapy">
                <div class="activity-details">
                    <h3>Music Therapy</h3>
                    <a href="activity_detail.php?activity_name=Music%20Therapy" class="view-details">View Details</a>
                </div>
            </div>

            <!-- Art Therapy -->
            <div class="activity-card">
                <img src="assets/images/art_therapy.jpg" alt="Art Therapy">
                <div class="activity-details">
                    <h3>Art Therapy</h3>
                    <a href="activity_detail.php?activity_name=Art%20Therapy" class="view-details">View Details</a>
                </div>
            </div>

            <!-- Book Reading -->
            <div class="activity-card">
                <img src="assets/images/book_reading.jpg" alt="Book Reading">
                <div class="activity-details">
                    <h3>Book Reading</h3>
                    <a href="activity_detail.php?activity_name=Book%20Reading" class="view-details">View Details</a>
                </div>
            </div>

            <!-- Repetitive Prayer -->
            <div class="activity-card">
                <img src="assets/images/repetitive_prayer.jpg" alt="Repetitive Prayer">
                <div class="activity-details">
                    <h3>Repetitive Prayer</h3>
                    <a href="activity_detail.php?activity_name=Repetitive%20Prayer" class="view-details">View Details</a>
                </div>
            </div>

            <!-- Meditation -->
            <div class="activity-card">
                <img src="assets/images/meditation.jpg" alt="Meditation">
                <div class="activity-details">
                    <h3>Meditation</h3>
                    <a href="activity_detail.php?activity_name=Meditation" class="view-details">View Details</a>
                </div>
            </div>

            <!-- Playing with Pets -->
            <div class="activity-card">
                <img src="assets/images/pets.jpg" alt="Playing with Pets">
                <div class="activity-details">
                    <h3>Playing with Pets</h3>
                    <a href="activity_detail.php?activity_name=Playing%20with%20Pets" class="view-details">View Details</a>
                </div>
            </div>

            <!-- Gym -->
            <div class="activity-card">
                <img src="assets/images/gym.jpg" alt="Gym">
                <div class="activity-details">
                    <h3>Gym</h3>
                    <a href="activity_detail.php?activity_name=Gym" class="view-details">View Details</a>
                </div>
            </div>

            <!-- Zumba -->
            <div class="activity-card">
                <img src="assets/images/zumba.jpg" alt="Zumba">
                <div class="activity-details">
                    <h3>Zumba</h3>
                    <a href="activity_detail.php?activity_name=Zumba" class="view-details">View Details</a>
                </div>
            </div>
        </div>
    </section>

    <?php
    // Include the footer
    include 'includes/footer.php';
    ?>
</body>
</html>

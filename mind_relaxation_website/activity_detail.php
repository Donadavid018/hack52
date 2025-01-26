<?php
// Include the header
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Details</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        .activity-detail-section {
            font-family: Arial, sans-serif;
            padding: 20px;
            text-align: center;
        }

        .activity-detail-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            color: #333;
        }

        .activity-detail-card img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
        }

        .activity-detail-info {
            text-align: left;
            margin-top: 20px;
            width: 100%;
        }

        .activity-detail-info h3 {
            margin-bottom: 15px;
            color: #333;
        }

        .activity-details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .activity-details-grid p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <section class="activity-detail-section">
        <?php
        // Expanded activities array with comprehensive details
        $activities = [
            'Yoga' => [
                'location' => 'Central Park',
                'time' => '10:00 AM - 11:00 AM',
                'image' => 'yoga.jpg',
                'description' => 'A relaxing yoga session to calm your mind and improve flexibility.',
                'instructor' => 'Emily Chen',
                'difficulty' => 'Beginner Friendly',
                'equipment' => 'Yoga mat, comfortable clothing',
                'benefits' => 'Improves flexibility, reduces stress, enhances mental clarity',
                'additional_info' => 'Bring water and wear layers. Mats are available for rent.'
            ],
            'Music Therapy' => [
                'location' => 'Music Hall',
                'time' => '2:00 PM - 3:00 PM',
                'image' => 'music_therapy.jpg',
                'description' => 'Experience the healing power of music through guided therapeutic sessions.',
                'instructor' => 'Dr. Michael Rodriguez',
                'session_type' => 'Group Session',
                'instruments' => 'Various percussion and melodic instruments',
                'benefits' => 'Reduces anxiety, improves mood, enhances emotional expression',
                'additional_info' => 'No musical experience required. All instruments provided.'
            ],
            'Art Therapy' => [
                'location' => 'Art Studio',
                'time' => '1:00 PM - 2:30 PM',
                'image' => 'art_therapy.jpg',
                'description' => 'Express yourself through creative art-making in a supportive environment.',
                'instructor' => 'Sarah Thompson',
                'difficulty' => 'All Levels Welcome',
                'equipment' => 'All art supplies provided',
                'benefits' => 'Reduces stress, improves self-expression, enhances emotional well-being',
                'additional_info' => 'No prior art experience necessary. Materials included.'
            ],
            'Book Reading' => [
                'location' => 'Library',
                'time' => '4:00 PM - 5:00 PM',
                'image' => 'book_reading.jpg',
                'description' => 'Join a peaceful book reading session with group discussions.',
                'instructor' => 'David Williams',
                'session_type' => 'Group Discussion',
                'book_genre' => 'Rotating genres monthly',
                'benefits' => 'Improves comprehension, enhances vocabulary, provides social interaction',
                'additional_info' => 'Books will be provided. Bring your favorite reading glasses!'
            ],
            'Repetitive Prayer' => [
                'location' => 'Prayer Room',
                'time' => '6:00 AM - 7:00 AM',
                'image' => 'repetitive_prayer.jpg',
                'description' => 'A meditative prayer session focusing on mindfulness and spiritual connection.',
                'instructor' => 'Reverend John Smith',
                'difficulty' => 'All Levels',
                'prayer_focus' => 'Mindfulness and Inner Peace',
                'benefits' => 'Reduces anxiety, increases spiritual awareness, promotes mental calm',
                'additional_info' => 'Quiet atmosphere. Cushions and prayer mats available.'
            ],
            'Meditation' => [
                'location' => 'Zen Garden',
                'time' => '7:00 AM - 8:00 AM',
                'image' => 'meditation.jpg',
                'description' => 'Guided meditation to help you find inner peace and mental clarity.',
                'instructor' => 'Lisa Wong',
                'difficulty' => 'Beginner to Advanced',
                'meditation_type' => 'Mindfulness and Breath Work',
                'benefits' => 'Reduces stress, improves concentration, enhances emotional regulation',
                'additional_info' => 'Comfortable clothing recommended. Cushions provided.'
            ],
            'Playing with Pets' => [
                'location' => 'Pet Park',
                'time' => '10:00 AM - 12:00 PM',
                'image' => 'pets.jpg',
                'description' => 'Interact with friendly pets in a supervised, therapeutic environment.',
                'instructor' => 'Mark Johnson',
                'pet_types' => 'Dogs, Cats, and Small Animals',
                'benefits' => 'Reduces stress, improves mood, provides emotional support',
                'additional_info' => 'All animals are professionally trained and vaccinated.'
            ],
            'Gym' => [
                'location' => 'Fitness Center',
                'time' => '8:00 AM - 9:00 AM',
                'image' => 'gym.jpg',
                'description' => 'A comprehensive workout session with professional guidance.',
                'instructor' => 'Alex Martinez',
                'difficulty' => 'Intermediate',
                'equipment' => 'Full gym equipment available',
                'benefits' => 'Improves physical fitness, builds strength, boosts energy',
                'additional_info' => 'Bring workout clothes and a water bottle. Towels provided.'
            ],
            'Zumba' => [
                'location' => 'Dance Studio',
                'time' => '5:00 PM - 6:00 PM',
                'image' => 'zumba.jpg',
                'description' => 'High-energy dance fitness class that combines fun and exercise.',
                'instructor' => 'Maria Garcia',
                'difficulty' => 'All Fitness Levels',
                'equipment' => 'Comfortable workout clothes, water bottle',
                'benefits' => 'Improves cardiovascular health, burns calories, boosts mood',
                'additional_info' => 'No dance experience required. Come ready to have fun!'
            ]
        ];

        // Get the activity name from the URL parameter
        $activity_name = $_GET['activity_name'] ?? null;

        if ($activity_name && isset($activities[$activity_name])) {
            // Get the activity details from the array based on the name
            $activity = $activities[$activity_name];
        ?>

        <div class="activity-detail-card">
            <img src="assets/images/<?= htmlspecialchars($activity['image']) ?>" alt="<?= htmlspecialchars($activity_name) ?>">
            <div class="activity-detail-info">
                <h3><?= htmlspecialchars($activity_name) ?></h3>
                <p><?= htmlspecialchars($activity['description']) ?></p>
                
                <div class="activity-details-grid">
                    <div>
                        <p><strong>Location:</strong> <?= htmlspecialchars($activity['location']) ?></p>
                        <p><strong>Time:</strong> <?= htmlspecialchars($activity['time']) ?></p>
                        
                        <?php if (isset($activity['instructor'])): ?>
                            <p><strong>Instructor:</strong> <?= htmlspecialchars($activity['instructor']) ?></p>
                        <?php endif; ?>
                        
                        <?php if (isset($activity['difficulty'])): ?>
                            <p><strong>Difficulty:</strong> <?= htmlspecialchars($activity['difficulty']) ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <div>
                        <?php if (isset($activity['equipment'])): ?>
                            <p><strong>Equipment:</strong> <?= htmlspecialchars($activity['equipment']) ?></p>
                        <?php endif; ?>
                        
                        <?php if (isset($activity['benefits'])): ?>
                            <p><strong>Benefits:</strong> <?= htmlspecialchars($activity['benefits']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (isset($activity['additional_info'])): ?>
                    <div style="margin-top: 15px;">
                        <p><strong>Additional Information:</strong> <?= htmlspecialchars($activity['additional_info']) ?></p>
                    </div>
                <?php endif; ?>

                <?php
                // Display any extra fields specific to the activity
                $extra_fields = array_diff_key($activity, array_flip(['location', 'time', 'image', 'description', 'instructor', 'difficulty', 'equipment', 'benefits', 'additional_info']));
                if (!empty($extra_fields)) {
                    echo '<div style="margin-top: 15px;">';
                    foreach ($extra_fields as $field_name => $field_value) {
                        echo '<p><strong>' . htmlspecialchars(ucwords(str_replace('_', ' ', $field_name))) . ':</strong> ' . htmlspecialchars($field_value) . '</p>';
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <?php } else { ?>
            <p>Activity not found. Please select a valid activity.</p>
        <?php } ?>
    </section>

    <?php
    // Include the footer file
    include 'includes/footer.php';
    ?>
</body>
</html>
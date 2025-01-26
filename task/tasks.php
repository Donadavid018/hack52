
<?php
// tasks.php

// Array of tasks with their names and links
$tasks = [
    [
        'name' => 'Task 1: tic tac toe',
        'link' => 'tic_tac_toe.php'
    ],
    [
        'name' => 'Task 2: snake',
        'link' => 'snake.php'
    ],
    [
        'name' => 'Task 3: paper',
        'link' => 'paper.php'
    ],
    [
        'name' => 'Task 4: card',
        'link' => 'card.php'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link rel="stylesheet" href="/mind_relaxation_website/assets/css/style.css">
    <style>
        /* Set background image for the page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('/mind_relaxation_website/assets/images/game.jpg'); /* Path to the background image */
            background-size: cover;
            background-position: center;
            color: #fff; /* Make text white to contrast with the background */
        }

        /* Style for the home section */
        .home {
            text-align: center;
            padding: 100px;
        }

        /* Style for the tasks list */
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
        }

        a {
            text-decoration: none;
            color:black;
            font-size: 1.2em;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Add a semi-transparent overlay for better readability */
        .home {
            background-color: rgba(0, 0, 0, 0.5); /* Black overlay with 50% opacity */
            border-radius: 8px;
            padding: 20px;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 30px;
        }
    </style>
</head>
<body class="home">
<?php
// Include the database connection and header file
$includeHeader = '../includes/sheader.php';
if (file_exists($includeHeader)) {
    include $includeHeader;
} else {
    echo "Error: Header file not found.";
}
?>
    <h1>Tasks</h1>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li><a href="<?= htmlspecialchars($task['link']) ?>"><?= htmlspecialchars($task['name']) ?></a></li>
        <?php endforeach; ?>
    </ul>
    
    <?php
// Include the footer file
$includeFooter = '../includes/sfooter.php';
if (file_exists($includeFooter)) {
    include $includeFooter;
} else {
    echo "Error: Footer file not found.";
}
?>
</body>
</html>

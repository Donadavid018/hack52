<?php
session_start();

// Initialize score if not already set
if (!isset($_SESSION['player_score'])) {
    $_SESSION['player_score'] = 0;
    $_SESSION['computer_score'] = 0;
}

// Handle reset
if (isset($_POST['reset'])) {
    $_SESSION['player_score'] = 0;
    $_SESSION['computer_score'] = 0;
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Choices
$choices = ['rock', 'paper', 'scissors'];

// Handle player's choice
if (isset($_POST['player_choice'])) {
    $player_choice = $_POST['player_choice'];
    $computer_choice = $choices[array_rand($choices)];

    // Determine the winner
    if ($player_choice === $computer_choice) {
        $result = "It's a tie!";
    } elseif (
        ($player_choice === 'rock' && $computer_choice === 'scissors') ||
        ($player_choice === 'paper' && $computer_choice === 'rock') ||
        ($player_choice === 'scissors' && $computer_choice === 'paper')
    ) {
        $result = "You win!";
        $_SESSION['player_score']++;
    } else {
        $result = "Computer wins!";
        $_SESSION['computer_score']++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock, Paper, Scissors</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f7f7f7;
            padding: 20px;
        }
        .choice-button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
        }
        .choice-button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
        .score {
            margin-top: 20px;
            font-size: 16px;
        }
        .reset-button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #FF4136;
            color: white;
        }
        .reset-button:hover {
            background-color: #b32421;
        }
    </style>
</head>
<body>
<?php
// Include the database connection and header file

include '../includes/sheader.php';
?>

    <h1>Rock, Paper, Scissors</h1>

    <form method="POST">
        <button class="choice-button" name="player_choice" value="rock">Rock</button>
        <button class="choice-button" name="player_choice" value="paper">Paper</button>
        <button class="choice-button" name="player_choice" value="scissors">Scissors</button>
    </form>

    <?php if (isset($result)): ?>
        <div class="result">
            <p>You chose: <strong><?= htmlspecialchars($player_choice) ?></strong></p>
            <p>Computer chose: <strong><?= htmlspecialchars($computer_choice) ?></strong></p>
            <p><?= $result ?></p>
        </div>
    <?php endif; ?>

    <div class="score">
        <p>Your Score: <?= $_SESSION['player_score'] ?></p>
        <p>Computer Score: <?= $_SESSION['computer_score'] ?></p>
    </div>

    <form method="POST">
        <button class="reset-button" name="reset">Reset Scores</button>
    </form>
    <?php
        // Include the database connection and header file
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

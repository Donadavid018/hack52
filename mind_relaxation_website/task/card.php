<?php
session_start();

// Initialize game state
if (!isset($_SESSION['cards'])) {
    $cards = range(1, 8);
    $cards = array_merge($cards, $cards); // Duplicate cards for matching pairs
    shuffle($cards);

    $_SESSION['cards'] = $cards;
    $_SESSION['flipped'] = []; // Tracks flipped card indices
    $_SESSION['matched'] = []; // Tracks matched cards
    $_SESSION['score'] = 0; // Player's score
}

// Handle reset
if (isset($_POST['reset'])) {
    unset($_SESSION['cards'], $_SESSION['flipped'], $_SESSION['matched'], $_SESSION['score']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Handle card flip
if (isset($_POST['card'])) {
    $cardIndex = (int)$_POST['card'];

    // Add card to flipped list if not already flipped or matched
    if (!in_array($cardIndex, $_SESSION['flipped']) && !in_array($cardIndex, $_SESSION['matched'])) {
        $_SESSION['flipped'][] = $cardIndex;

        // Check for match when two cards are flipped
        if (count($_SESSION['flipped']) === 2) {
            $firstIndex = $_SESSION['flipped'][0];
            $secondIndex = $_SESSION['flipped'][1];

            if ($_SESSION['cards'][$firstIndex] === $_SESSION['cards'][$secondIndex]) {
                $_SESSION['matched'][] = $firstIndex;
                $_SESSION['matched'][] = $secondIndex;
                $_SESSION['score']++;
            }

            // Clear flipped cards after a short delay
            sleep(1);
            $_SESSION['flipped'] = [];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory Card Flip</title>
    <link rel="stylesheet" href="/mind_relaxation_website/assets/css/style.css">
    <style>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .home{
            text-align:center;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(4, 100px);
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }
        .card {
            width: 100px;
            height: 100px;
            background-color: #007BFF;
            color: white;
            font-size: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            border-radius: 8px;
            border: none;
        }
        .card.flipped, .card.matched {
            background-color: #28a745;
            cursor: default;
        }
        .score {
            margin: 20px;
            font-size: 20px;
        }
        .reset-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #FF4136;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .reset-button:hover {
            background-color: #b32421;
        }
    </style>
</head>
<body class="home">
<?php
// Include the database connection and header file

include '../includes/sheader.php';
?>
    <h1>Memory Card Flip</h1>

    <div class="score">Score: <?= $_SESSION['score'] ?></div>

    <div class="grid">
        <?php foreach ($_SESSION['cards'] as $index => $value): ?>
            <?php
            $isFlipped = in_array($index, $_SESSION['flipped']);
            $isMatched = in_array($index, $_SESSION['matched']);
            ?>
            <form method="POST" style="display: inline-block; margin: 0;">
                <button
                    type="submit"
                    name="card"
                    value="<?= $index ?>"
                    class="card <?= $isFlipped || $isMatched ? 'flipped' : '' ?>"
                    <?= $isFlipped || $isMatched ? 'disabled' : '' ?>>
                    <?= $isFlipped || $isMatched ? $value : '' ?>
                </button>
            </form>
        <?php endforeach; ?>
    </div>

    <form method="POST" style="margin-top: 20px;">
        <button type="submit" name="reset" class="reset-button">Reset Game</button>
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

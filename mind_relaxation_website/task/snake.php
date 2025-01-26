<?php
session_start();

// Initialize game state if not already set
if (!isset($_SESSION['snake'])) {
    $_SESSION['snake'] = [[5, 5]]; // Snake starts at the center of the grid
    $_SESSION['food'] = [rand(1, 9), rand(1, 9)]; // Random food position
    $_SESSION['direction'] = 'RIGHT'; // Initial direction
    $_SESSION['score'] = 0; // Score starts at 0
}

// Reset game
if (isset($_POST['reset'])) {
    unset($_SESSION['snake'], $_SESSION['food'], $_SESSION['direction'], $_SESSION['score']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Update direction based on player input
if (isset($_POST['direction'])) {
    $newDirection = $_POST['direction'];
    $opposite = ['UP' => 'DOWN', 'DOWN' => 'UP', 'LEFT' => 'RIGHT', 'RIGHT' => 'LEFT'];
    if ($newDirection !== $opposite[$_SESSION['direction']]) {
        $_SESSION['direction'] = $newDirection;
    }
}

// Move the snake
function moveSnake() {
    $head = $_SESSION['snake'][0];
    $newHead = $head;

    switch ($_SESSION['direction']) {
        case 'UP':
            $newHead[1]--;
            break;
        case 'DOWN':
            $newHead[1]++;
            break;
        case 'LEFT':
            $newHead[0]--;
            break;
        case 'RIGHT':
            $newHead[0]++;
            break;
    }

    // Check for collisions with walls or itself
    if ($newHead[0] < 0 || $newHead[0] > 9 || $newHead[1] < 0 || $newHead[1] > 9 || in_array($newHead, $_SESSION['snake'])) {
        echo "<script>alert('Game Over! Your score: " . $_SESSION['score'] . "');</script>";
        unset($_SESSION['snake'], $_SESSION['food'], $_SESSION['direction'], $_SESSION['score']);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    // Check if the snake eats food
    if ($newHead == $_SESSION['food']) {
        $_SESSION['score']++;
        $_SESSION['food'] = [rand(0, 9), rand(0, 9)];
    } else {
        array_pop($_SESSION['snake']); // Remove the tail
    }

    array_unshift($_SESSION['snake'], $newHead); // Add new head to the snake
}

moveSnake();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snake Game</title>
    <link rel="stylesheet" href="/mind_relaxation_website/assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(10, 30px);
            grid-template-rows: repeat(10, 30px);
            gap: 1px;
        }
        .cell {
            width: 30px;
            height: 30px;
            background-color: #fff;
            border: 1px solid #ccc;
        }
        .snake {
            background-color: green;
        }
        .food {
            background-color: red;
        }
        .controls {
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php
// Include the database connection and header file
$includeHeader = '../includes/sheader.php';
if (file_exists($includeHeader)) {
    include $includeHeader;
} else {
    echo "Error: Header file not found.";
}
?>

    <h1>Snake Game</h1>
    <p>Score: <?= $_SESSION['score'] ?></p>

    <div class="grid">
        <?php for ($y = 0; $y < 10; $y++): ?>
            <?php for ($x = 0; $x < 10; $x++): ?>
                <?php
                $class = '';
                if (in_array([$x, $y], $_SESSION['snake'])) {
                    $class = 'snake';
                } elseif ($_SESSION['food'] == [$x, $y]) {
                    $class = 'food';
                }
                ?>
                <div class="cell <?= $class ?>"></div>
            <?php endfor; ?>
        <?php endfor; ?>
    </div>

    <form method="POST" class="controls">
        <button type="submit" name="direction" value="UP">Up</button><br>
        <button type="submit" name="direction" value="LEFT">Left</button>
        <button type="submit" name="direction" value="RIGHT">Right</button><br>
        <button type="submit" name="direction" value="DOWN">Down</button>
    </form>

    <form method="POST">
        <button type="submit" name="reset">Reset Game</button>
    </form>
    <?php
// Include the footer file
$includeFooter = '../includes/footer.php';
if (file_exists($includeFooter)) {
    include $includeFooter;
} else {
    echo "Error: Footer file not found.";
}
?>

</body>
</html>

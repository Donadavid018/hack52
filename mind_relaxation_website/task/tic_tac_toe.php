<?php
session_start();

// Initialize the game state if not set
if (!isset($_SESSION['board'])) {
    $_SESSION['board'] = array_fill(0, 9, ''); // 3x3 board
    $_SESSION['player'] = 'X';
    $_SESSION['points'] = 0;
}

// Reset game
if (isset($_POST['reset'])) {
    $_SESSION['board'] = array_fill(0, 9, '');
    $_SESSION['player'] = 'X';
}

// Check winner function
function checkWinner($board) {
    $winningCombos = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8], // Rows
        [0, 3, 6], [1, 4, 7], [2, 5, 8], // Columns
        [0, 4, 8], [2, 4, 6]             // Diagonals
    ];

    foreach ($winningCombos as $combo) {
        if ($board[$combo[0]] !== '' &&
            $board[$combo[0]] === $board[$combo[1]] &&
            $board[$combo[1]] === $board[$combo[2]]) {
            return $board[$combo[0]];
        }
    }

    return null;
}

// Handle player move
if (isset($_POST['move']) && is_numeric($_POST['move'])) {
    $move = (int)$_POST['move'];
    if ($_SESSION['board'][$move] === '') {
        $_SESSION['board'][$move] = $_SESSION['player'];
        $winner = checkWinner($_SESSION['board']);

        if ($winner) {
            $_SESSION['points'] += 10; // Add points for a win
            echo "<script>alert('Player $winner wins!');</script>";
            $_SESSION['board'] = array_fill(0, 9, ''); // Reset board
        } elseif (!in_array('', $_SESSION['board'])) {
            echo "<script>alert('It\'s a draw!');</script>";
            $_SESSION['board'] = array_fill(0, 9, ''); // Reset board
        } else {
            // Switch player
            $_SESSION['player'] = $_SESSION['player'] === 'X' ? 'O' : 'X';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .board {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-template-rows: repeat(3, 100px);
            gap: 5px;
        }
        .cell {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            border: 1px solid #ccc;
            font-size: 2em;
            font-weight: bold;
            cursor: pointer;
        }
        .cell:hover {
            background-color: #e0e0e0;
        }
        .cell.disabled {
            pointer-events: none;
            color: #aaa;
        }
        .info {
            margin-top: 20px;
            text-align: center;
        }
        .countdown {
            font-size: 1.2em;
            color: red;
        }
        button {
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
        }
    </style>
    <script>
        let timeLeft = 10;
        const timerInterval = setInterval(() => {
            const timer = document.getElementById('timer');
            if (timeLeft > 0) {
                timeLeft--;
                timer.textContent = timeLeft;
            } else {
                alert('Time up! Resetting the game.');
                clearInterval(timerInterval);
                document.getElementById('reset').click();
            }
        }, 1000);
    </script>
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
    <h1>Tic Tac Toe</h1>
    <div class="board">
        <?php foreach ($_SESSION['board'] as $index => $cell): ?>
            <form method="POST" style="display: inline;">
                <input type="hidden" name="move" value="<?= $index ?>">
                <div class="cell <?= $cell ? 'disabled' : '' ?>">
                    <button type="submit" style="width: 100%; height: 100%; border: none; background: none;">
                        <?= htmlspecialchars($cell) ?>
                    </button>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
    <div class="info">
        <p>Current Player: <?= $_SESSION['player'] ?></p>
        <p>Points: <?= $_SESSION['points'] ?></p>
        <p>Time Left: <span id="timer" class="countdown">10</span> seconds</p>
    </div>
    <form method="POST">
        <button type="submit" name="reset" id="reset">Reset Game</button>
    </form>
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

<?php
// Include the database connection and header file
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Calm Waves</title>
    <link rel="stylesheet" href="assets/css/styles.css"> <!-- Link to CSS -->
    <style>
        body {
            background-image: url('assets/images/ab.jpg'); /* Add your background image path here */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #about-page {
            background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent background for readability */
            padding: 20px;
        }

        h2, h3, h4 {
            color: #333;
        }

        .about-container {
            margin-bottom: 30px;
            
        }

        .about-intro, .about-mission, .about-vision, .about-values {
            margin-bottom: 20px;
        }

        .game-list {
            display: flex;
            flex-direction: column;
        }

        .game-item {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- About Us Section -->
    <section id="about-page">
        <h2>About Us</h2>
        <div class="about-container">
            <div class="about-intro">
                <p>Welcome to <strong>Calm Waves</strong>, your trusted platform for mental well-being. We offer a variety of fun and engaging activities designed to help you relax and unwind. Here, you can explore games that enhance focus, strategic thinking, and mental clarity.</p>
            </div>
            
            <div class="about-mission">
                <h3>Our Mission</h3>
                <p>To create a welcoming space for individuals to discover activities that foster mental clarity, emotional balance, and overall relaxation.</p>
            </div>

            <div class="about-vision">
                <h3>Our Vision</h3>
                <p>We envision a world where mental health is prioritized, and people have access to various tools and practices to achieve a peaceful and fulfilling life.</p>
            </div>
        </div>

        <div class="about-values">
            <h3>Our Core Values</h3>
            <ul>
                <li>Inclusivity: Activities for everyone, regardless of age or background.</li>
                <li>Accessibility: Making mental wellness practices available to all.</li>
                <li>Empowerment: Encouraging self-care and personal growth.</li>
                <li>Innovation: Continuously improving our offerings to meet your needs.</li>
            </ul>
        </div>

        <!-- Games Section -->
        <div class="about-games">
            <h3>Our Games</h3>
            <div class="game-list">
                <div class="game-item">
                    <h4>Snake Game</h4>
                    <p>The Snake game is a classic arcade game where the player controls a snake that moves around a grid to eat food, which makes the snake grow longer. The objective is to collect as much food as possible while avoiding collisions with the walls or the snake's own body. The player can control the snake's direction using buttons to move it up, down, left, or right. Each time the snake eats food, the player's score increases, and a new piece of food appears randomly on the grid. The game ends if the snake collides with itself or the boundary, and the player's final score is displayed.</p>
                </div>
                <div class="game-item">
                    <h4>Card Game</h4>
                    <p>The Memory Card Flip Game is a fun and interactive game where the player needs to find matching pairs of cards. Initially, all cards are face down, and the player flips over two cards at a time. If the cards match, they remain face up; if not, they are flipped back over. The objective is to match all pairs while keeping track of the score, which increases with each successful match. The game ends when all pairs are matched. The player can also reset the game to start over. It's a great way to enhance memory and concentration skills in an enjoyable and challenging format.</p>
                </div>
                <div class="game-item">
                    <h4>Rock, Paper, Scissors</h4>
                    <p>The Rock, Paper, Scissors game is a simple, yet entertaining game where the player competes against the computer by choosing one of three options: rock, paper, or scissors. The rules are straightforward: rock beats scissors, scissors beats paper, and paper beats rock. The game displays the player's and the computer's choices, followed by the result, which could be a win, loss, or tie. Each win earns the player a point, while the computer scores for its wins. Players can reset the scores to start a new game. It’s a quick and fun game to test luck and decision-making!</p>
                </div>
                <div class="game-item">
                    <h4>Tic Tac Toe</h4>
                    <p>Tic Tac Toe is a simple two-player game played on a 3x3 grid. Players take turns placing their marks, either "X" or "O," in an empty cell. The goal is to get three of the same marks in a row, column, or diagonal. After each move, the game checks if there's a winner or a draw. The player who wins earns points, and the game resets for a new round. If no player wins and the board fills up without a draw, the game ends in a tie. Players can also reset the game at any time to start over.</p>
                </div>
            </div>
        </div>
    </section>

    <?php
    // Include the footer file
    include 'includes/footer.php';
    ?>
</body>
</html>

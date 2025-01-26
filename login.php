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
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        /* Body styling with background image */
        body {
            background-image: url('assets/images/reg.jpg'); /* Path to your background image */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navigation bar styling */
        .navbar {
            background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent black background */
            padding: 15px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        /* Login section styling */
        .login-section {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
            margin: 50px auto; /* Center the login section */
        }

        h2 {
            margin-bottom: 20px;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- Navigation bar -->
    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
        <a href="services.php">Services</a>
    </div>

    <!-- Login Section -->
    <section class="login-section">
        <h2>Login</h2>
        <?php
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Query to fetch user data
            $query = "SELECT * FROM Users WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];

                // Redirect to the user dashboard
                echo "<script>alert('Login successful!'); window.location.href = 'index.php';</script>";
            } else {
                // Display error message
                echo "<p class='error-message'>Invalid email or password. Please try again.</p>";
            }
        }
        ?>

        <!-- Login Form -->
        <form method="POST" class="login-form">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </section>

    <?php
    // Include the footer file
    include 'includes/footer.php';
    ?>
</body>
</html>

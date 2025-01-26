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
    <title>Register</title>
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

        /* Register section styling */
        .register-section {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
            margin: 50px auto; /* Center the section below the navbar */
        }

        h2 {
            margin-bottom: 20px;
        }

        .register-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .register-form button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .register-form button:hover {
            background-color: #218838;
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

    <!-- Register Section -->
    <section class="register-section">
        <h2>Register</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Insert user data into the database
            $query = "INSERT INTO Users (name, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);

            try {
                $stmt->execute([$name, $email, $password]);
                echo "<script>alert('Registration successful!');</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
            }
        }
        ?>

        <!-- Registration Form -->
        <form method="POST" class="register-form">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
    </section>

    <?php
    // Include the footer file
    include 'includes/footer.php';
    ?>
</body>
</html>

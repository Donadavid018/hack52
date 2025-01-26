<?php
// Database connection settings
$host = 'localhost';     // Hostname (use 'localhost' for local development)
$dbname = 'mind_relaxation'; // Name of your database
$username = 'root';      // Database username (default for XAMPP/WAMP is 'root')
$password = '';          // Database password (default for XAMPP/WAMP is empty)

// Create a PDO instance for database connection
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Optional: Set the default fetch mode to associative array
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // If an error occurs, display a user-friendly message and exit
    die("Database connection failed: " . $e->getMessage());
}
?>

<?php
// Database credentials
define('SERVERNAME', '127.0.0.1:3306');
define('USERNAME', 'root');
define('PASSWORD', 'mariadb');  // Change this to your actual password
define('DBNAME', 'ExLibro');    // Ensure the database name matches

// Establishing connection
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

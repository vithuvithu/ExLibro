<?php
// Start the session
session_start();

// Destroy the session
session_destroy();

// Redirect to the index page
header("Location: /ExLibro/Frontend/index.php"); // Use absolute path
exit();
?>
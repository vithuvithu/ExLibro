<?php
include('dbconf.php');
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: /ExLibro/Frontend/login.php');
    exit();
}

// Get the user data from the form
$user_id = $_SESSION['user_id'];
$username = $_POST['username'];
$email = $_POST['email'];

 
$sql = "UPDATE users SET username='$username', email='$email' WHERE id='$user_id'";

 
if ($conn->query($sql) === TRUE) {
    echo "Profile updated successfully!";
    
    header('Location: profile.php');  
    exit();
} else {
    echo "Error updating profile: " . $conn->error;
}
?>

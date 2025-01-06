<?php
include('dbconf.php');
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get the user data from the form
$user_id = $_SESSION['user_id'];
$username = $_POST['username'];
$email = $_POST['email'];

// Update query
$sql = "UPDATE users SET username='$username', email='$email' WHERE id='$user_id'";

// Execute the update query
if ($conn->query($sql) === TRUE) {
    echo "Profile updated successfully!";
    // Optionally, you can redirect to the profile page or show a success message
    header('Location: profile.php'); // Assuming you have a profile page
    exit();
} else {
    echo "Error updating profile: " . $conn->error;
}
?>

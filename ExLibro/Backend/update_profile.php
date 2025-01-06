<?php
include('dbconf.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $user_id = $_SESSION['user_id']; // Assuming user_id is stored in the session

    $sql = "UPDATE users SET username='$username', email='$email' WHERE id='$user_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: Front end/profile.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
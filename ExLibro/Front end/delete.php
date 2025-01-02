<?php

include('dbconf.php');

 
session_start();

if (!isset($_SESSION['user_id'])) {
     
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Assuming user_id is stored in the session


if (isset($_POST['delete'])) {
     
    $sql = "DELETE FROM users WHERE id = '$user_id'";

     
    if ($conn->query($sql) === TRUE) {
       
        session_destroy();
        header("Location: login.php");
        exit();
    } else {
        // If there is an error with the query
        echo "Error: " . $conn->error;
    }
}

 
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" href="css/styles.css">  
</head>
<body>
    <div class="usercred-box">
        <h2 class="usercred-title">Delete Account</h2>
        <p>Are you sure you want to delete your account? This action cannot be undone.</p>

        <form method="POST" action="delete.php">
            <input type="submit" name="delete" value="Yes, delete my account">
        </form>

        <a href="profile.php">Cancel</a>
    </div>
</body>
</html>

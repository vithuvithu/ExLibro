<?php
 
session_start();

 
include('../Backend/dbconf.php');  
 
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id']; 

if (isset($_POST['delete'])) { 
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);  

    if ($stmt->execute()) {
        session_destroy(); 
        header("Location: login.php"); // Redirect to login page
        exit();
    } else {
         
        echo "Error: " . htmlspecialchars($stmt->error);  
    }

    $stmt->close();  
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
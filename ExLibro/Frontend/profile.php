<?php
 
error_reporting(E_ALL);
ini_set('display_errors', 1);

 
session_start();

 
include('../Backend/dbconf.php');

 
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id']; 
$sql = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
     
    header("Location: error.php?message=User  not found");
 exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile - ExLibro</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Your Profile</h1>
        <nav class="nav-bar">
            <ul class="nav-items">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="../Backend/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Welcome, <?php echo htmlspecialchars($users['username']); ?></h2>
        <p>Your email: <?php echo htmlspecialchars($users['email']); ?></p>
        <a href="edit_profile.php">Edit Profile</a>
    </main>
    <footer>
        <p>&copy; 2024 ExLibro. All rights reserved.</p>
    </footer>
</body>
</html>
<?php
 
session_start();

 
include('../Backend/dbconf.php');  

 
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id']; 

 
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     
    $user = $result->fetch_assoc();
} else {
    echo "User  not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - ExLibro</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Edit Your Profile</h1>
        <nav class="nav-bar">
            <ul class="nav-items">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="update_profile.php" method="POST">
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            <button type="submit">Update Profile</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Ex Libro. All rights reserved.</p>
    </footer>
</body>
</html>
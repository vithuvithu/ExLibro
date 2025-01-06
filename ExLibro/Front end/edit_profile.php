<?php
// Include the database configuration and start the session
include('dbconf.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Assuming the user is logged in and their ID is stored in session
$user_id = $_SESSION['user_id']; 

// Fetch user details from the database based on the session user ID
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch user details
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
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
                <b><li><a href="index.php">Home</a></li></b>
                <b><li><a href="about.php">About</a></li></b>
                <b><li><a href="contact.php">Contact</a></li></b>
                <b><li><a href="Backend/logout.php">Logout</a></li></b>
            </ul>
        </nav>
    </header>
    <main>
        <form action="update_profile.php" method="POST">
            <!-- User's current username will be pre-filled -->
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            <!-- User's current email will be pre-filled -->
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            <button type="submit">Update Profile</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 ExLibro. All rights reserved.</p>
    </footer>
</body>
</html>

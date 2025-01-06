<?php
// Include your database configuration file
include('dbconf.php');
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    // Check if user exists in the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();
        
        // Verify the password (assuming passwords are hashed)
        if (password_verify($password, $user['password'])) {
            // Start user session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Optionally, set a cookie if "Remember Me" is checked
            if ($remember) {
                setcookie('username', $username, time() + (86400 * 30), "/"); // 30 days
            }

            // Redirect to the user profile page or dashboard
            header("Location: Front end/profile.php");
            exit();
        } else {
            // Incorrect password
            echo "Incorrect password.";
        }
    } else {
        // No user found
        echo "User not found.";
    }
}

// Close the database connection
$conn->close();
?>

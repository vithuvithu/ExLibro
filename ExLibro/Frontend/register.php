<?php

include('../Backend/dbconf.php');  

error_reporting(E_ALL);
ini_set('display_errors', 1);

$error = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $email = trim($_POST['email']);

    if (empty($username) || empty($password) || empty($email)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        $username = $conn->real_escape_string($username);
        $email = $conn->real_escape_string($email);

        $sql_check = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result = $conn->query($sql_check);

        if ($result->num_rows > 0) {
            $error = "Error: Username or Email already exists.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";

            if ($conn->query($sql) === TRUE) {
                header("Location: login.php");
                exit();  
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    }
    $conn->close();
}
?>

<!-- Registration Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">   
</head>
<body>
<div class="logo-container">
    <img src="image/logo.png" alt="Logo" class="logo">
</div>
<h1><b>EXLIBRO</b></h1>

<div class="usercred-box">
    <h2 class="usercred-title">Register</h2>
    <form method="POST" action="register.php">
        <div class="usercred-form">  
            <input type="text" name="username" placeholder="Username" required value="<?php echo isset($username) ? $username : ''; ?>">
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required value="<?php echo isset($email) ? $email : ''; ?>">
            <?php if ($error) echo "<p class='error-message' style='color: red;'>$error</p>"; ?>
            <input type="submit" value="Register">
        </div>
    </form>
</div>
</body>
</html>
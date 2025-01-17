<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXLIBRO</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Ensure correct path -->
</head>
<body>
    <!-- Logo -->
    <div class="logo-container">
        <img src="image/logo.png" alt="Logo" class="logo">
    </div>
    
    <h1><b>EXLIBRO</b></h1>
    <hr>
    
    <!-- Nav Bar -->
    <div class="nav-bar">
        <ul class="nav-items">
            <b><li><a href="index.php"><span style="position: relative; left: 80px;">Home</span></a></li></b>
            <b><li><a href="about.php"><span style="position: relative; left: 80px;">About</span></a></li></b>
            <b><li><a href="login.php"><span style="position: relative; left: 80px;">Login</span></a></li></b>
            <b><li><a href="contact.php"><span style="position: relative; left: 80px;">Contact</span></a></li></b>
        </ul>
    </div>

    <!-- User Credential Box -->
    <div class="usercred-box">
        <h2 class="usercred-title">Login</h2>
        
        <!-- Form to handle user login -->
         
        <form class="usercred-form" action="../Backend/login_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            
            <span class="psw">Forgot <a href="#">password?</a></span>
            <label>
                <input type="checkbox" name="remember" checked="checked"> Remember me
            </label>
            
            <div class="login-links">
            
                <input type="submit" value="Login"> <br>
                <span class="Sign_up">Don't have an account? <a href="register.php">Sign up</a></span>
            </div>
        </form>
    </div>
 
</body>
</html>

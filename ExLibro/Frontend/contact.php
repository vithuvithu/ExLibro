<?php
session_start();     

 
$name = $email = $message = "";
$errors = [];

 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    }
    if (empty($message)) {
        $errors[] = "Message cannot be empty.";
    }

     
    if (empty($errors)) {
       
        $to = "your_email@example.com";  
        $subject = "New Contact Message from $name";
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email";

        
        if (mail($to, $subject, $body, $headers)) {
             
            header("Location: thank_you.php");  
            exit();
        } else {
            $errors[] = "There was an error sending your message. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - ExLibro</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="image/logo.png" alt="Logo" class="logo">
        </div>
        <h1><b>EXLIBRO</b></h1>
        <nav class="nav-bar">
            <ul class="nav-items">
                <div class="nav-bar">
                    <ul class="nav-items">
                        <b><li><a href="index.php">   Home</a></li></b>
                        <b><li><a href="about.php">About</a></li></b>
                       <b><li><a href="login.php">Login</a></li></b> 
                        <b><li><a href="contact.php">Contact</a></li></b>
                    </ul>
                </div>
            </ul>
        </nav>
        <h2><center>Contact Us</center></h2>
    </header>

    <section class="contact-box">
        <div class="contact-content">
            <p class="about">
                Have questions? Reach out to us! We are here to help with any inquiries related to ExLibro.
            </p>

            
            <?php if (!empty($errors)): ?>
                <div class="error-messages">
                    <?php foreach ($errors as $error): ?>
                        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form class="contact-form" action="contact.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required placeholder="Enter your name" value="<?php echo htmlspecialchars($name); ?>">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email" value="<?php echo htmlspecialchars($email); ?>">

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required placeholder="Enter your message"><?php echo htmlspecialchars($message); ?></textarea>

                <input type="submit" value="Submit">
            </form>
        </div>
    </section>
</body>
</html>
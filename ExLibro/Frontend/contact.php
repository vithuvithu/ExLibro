<?php
session_start(); // Start the session

// Initialize variables
$name = $email = $message = "";
$errors = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Validate input
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    }
    if (empty($message)) {
        $errors[] = "Message cannot be empty.";
    }

    // If there are no errors, process the data
    if (empty($errors)) {
        // Example: Send an email (you can also store it in a database)
        $to = "your_email@example.com"; // Change to your email address
        $subject = "New Contact Message from $name";
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email";

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            // Redirect or show success message
            header("Location: thank_you.php"); // Redirect to a thank you page
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
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <h2><center>Contact Us</center></h2>
    </header>

    <section class="contact-box">
        <div class="contact-content">
            <p class="about">
                Have questions? Reach out to us! We are here to help with any inquiries related to ExLibro.
            </p>

            <!-- Display error messages if any -->
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
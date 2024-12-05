<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About ExLibro</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <header>
    
              
            <div class="logo-container">
                <img src="image/logo.png" alt="Logo" class="logo">
                
            </div>
            <h1> <b> EXLIBRO </b> </h1>
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

            <form class="contact-form" action="/submit-contact" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required placeholder="Enter your name">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required placeholder="Enter your message"></textarea>

                <input type="submit" value="Submit">
            </form>
        </div>
    </section>

     
</body>
</html>

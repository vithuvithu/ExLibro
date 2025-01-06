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
                <div class="nav-bar">
                    <ul class="nav-items">
                        <b><li><a href="index.php">   Home</a></li></b>
                        <b><li><a href="about.php">About</a></li></b>
                       <b><li><a href="contact.php">Contact</a></li></b>
                       <b><li><a href="logout.php">Logout</a></li></b> 
                    </ul>
                </div>
            </ul>
        </nav>
    </header>
    <main>
        <form action="update_profile.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Update Profile</button>
        </form>
    </main>
    <footer>
        <p 2024 ExLibro. All rights reserved.</p>
    </footer>
</body>
</html>
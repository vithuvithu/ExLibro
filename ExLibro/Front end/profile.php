<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - ExLibro</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Your Profile</h1>
        <nav>
            <div class="nav-bar">
                <ul class="nav-items">
                    <b><li><a href="index.php"><span style="position: relative; left: 80px;">Home</span></a></li></b>
                    <b> <li><a href="about.php"><span style="position: relative; left: 80px;">About</span></a></li></b>
                     <b><li><a href="contact.php"><span style="position: relative; left: 80px;">Contact</span></a></li></b>
                   <b><li><a href="Backend/logout.php"><span style="position: relative; left: 80px;">Login</span></a></li></b>
                </ul>
            </div>
        </nav>
    </header>
    <div class="profile">
    <main>
        <h2>Welcome, [Username]</h2>
        <p>Your email: [User  Email]</p>
        <h3>Your Books</h3>
        <ul>
            <!-- Dynamically list user's books here -->
            <li>Book Title 1</li>
            <li>Book Title 2</li>
        </ul>
        <a href="edit_profile.php">Edit Profile</a>
    </main>
    </div>
    <footer>
        <p> 2024 ExLibro. All rights reserved.</p>
    </footer>
</body>
</html>
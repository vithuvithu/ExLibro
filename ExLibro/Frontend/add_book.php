 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book - ExLibro</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="image/logo.png" alt="Logo" class="logo">
        </div>
        <h1>Add a New Book</h1>
        <nav>
            <div class="nav-bar">
                <ul class="nav-items">
                    <b><li><a href="index.php"><span style="position: relative; left: 80px;">Home</span></a></li></b>
                    <b><li><a href="about.php"><span style="position: relative; left: 80px;">About</span></a></li></b>
                    <b><li><a href="contact.php"><span style="position: relative; left: 80px;">Contact</span></a></li></b>
                    <b><li><a href="logout.php"><span style="position: relative; left: 80px;">Logout</span></a></li></b>
                </ul>
            </div>
        </nav>
    </header>

     
    <div class="usercred-box">
        <h2 class="usercred-title",a>Add Book</h2>
        <form class="usercred-form">
        <form action="submit_book.php" method="POST">
            <input type="text" name="title" placeholder="Book Title" required>
            <input type="text" name="author" placeholder="Author" required>
            <textarea name="description" placeholder="Description" rows="5" required></textarea>
            
      <div class ="login-links">
            <input type="submit" value="Add Book"> <br>
              </div>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 ExLibro. All rights reserved.</p>
    </footer>
</body>
</html>

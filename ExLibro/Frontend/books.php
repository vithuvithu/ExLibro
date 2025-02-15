<?php
session_start();  
 
include('../Backend/dbconf.php');  

 
$search = '';

 
if (isset($_POST['search'])) {
    $search = trim($_POST['search']);
}

 
$sql = "SELECT id, title, author, description FROM books";
if ($search) {
     
    $search = $conn->real_escape_string($search);
    $sql .= " WHERE title LIKE '%$search%' OR author LIKE '%$search%'";
}

$result = $conn->query($sql);
 
if (!$result) {
    die("Query failed: " . $conn->error);
}

$books = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Books - ExLibro</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Available Books</h1>
        <nav>
            <div class="nav-bar">
                <ul class="nav-items">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    
    <main>
        <h2>Books Available for Exchange</h2>

        <!-- Search Form -->
        <form method="POST" action="">
            <input type="text" name="search" placeholder="Search by title or author" value="<?php echo htmlspecialchars($search); ?>">
            <input type="submit" value="Search">
        </form>
        
        <?php if (count($books) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($book['title']); ?></td>
                            <td><?php echo htmlspecialchars($book['author']); ?></td>
                            <td>
                                <button class="details-btn" onclick="toggleDetails(<?php echo $book['id']; ?>)">View Details</button>
                                <div id="details-<?php echo $book['id']; ?>" class="book-details" style="display:none;">
                                    <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($book['description'])); ?></p>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No books available at the moment.</p>
        <?php endif; ?>
    </main>
    
    <footer>
        <p>&copy; 2024 ExLibro. All rights reserved.</p>
    </footer>

    <script>
        function toggleDetails(bookId) {
            var detailsDiv = document.getElementById("details-" + bookId);
            if (detailsDiv.style.display === "none") {
                detailsDiv.style.display = "block";
            } else {
                detailsDiv.style.display = "none";
            }
        }
    </script>
</body>
</html>

<?php
include('dbconf.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $user_id = $_SESSION['owner_id'];  // Assuming owner_id is stored in session.

    // Correct the variable name in the SQL query.
    $sql = "INSERT INTO books (title, author, description, user_id) VALUES ('$title', '$author', '$description', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to books.php after a successful insertion.
        header("Location: Front end/books.php");
        exit();
    } else {
        // Display error message if the query fails.
        echo "Error adding book: " . $conn->error;
    }
}

$conn->close();
?>

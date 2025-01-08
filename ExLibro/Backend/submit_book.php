<?php
include('dbconf.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];   

    $sql = "INSERT INTO books (title, author, description, user_id) VALUES ('$title', '$author', '$description', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        header("Location: books.php");
        exit();
    } else {
        echo "Error adding book: " . $conn->error;
    }
}

$conn->close();
?>
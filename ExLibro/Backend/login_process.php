<?php
 
include('dbconf.php');  
session_start();
 
echo "Script started. <br>";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

     
    echo "Form submitted. Username: $username <br>";

     
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);  
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
         
        $user = $result->fetch_assoc();
        
         
        if (password_verify($password, $user['password'])) {
           
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

             
            if ($remember) {
                setcookie('username', $username, time() + (86400 * 30), "/");  
            }

             
            header("Location: ../Frontend/profile.php");  
            exit();
        } else {
             
            echo "Incorrect password.";
        }
    } else {
         
        echo "User  not found.";
    }

     
    $stmt->close();
}


$conn->close();
?>
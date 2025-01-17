<?php

session_start();
function Authentication($conn,$username,$password)
{
    $query = "select username,password from login
                where username ='$username' and password = '$password'";
    $result = mysqli_query($conn,$query);
    if ($result) {
         
        $resultCount = mysqli_num_rows($result);
       
        if ($resultCount == 1) {
             
            $_SESSION['loginuser'] = $username;
            $message ="Login success";
            
            header("Location: ../Frontend/profile.php");  

        } else {
        
            $message = "Login failed please check your username and password";
        }
        
    } else {
     
        $message = "Login failed please check your username and password";
    }
    return $message;
}
 

?>
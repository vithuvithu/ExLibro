<?php
 
define('SERVERNAME', '127.0.0.1:3306');  
define('USERNAME', 'root');               
define('PASSWORD', 'mariadb');            
define('DBNAME', 'ExLibro');               
 
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

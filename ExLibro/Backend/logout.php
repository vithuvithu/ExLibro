<?php
 
session_start();

 
session_destroy();

 
header("Location: /ExLibro/Frontend/index.php");  
exit();
?>
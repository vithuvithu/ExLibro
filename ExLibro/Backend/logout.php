<?php
session_start();
session_destroy();
header("Location: Front end/index.php");
exit();
?>
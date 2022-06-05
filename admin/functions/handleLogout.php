<?php
    session_start();
    unset($_SESSION['legitUser']);
    header('Location: ../login.php'); 
?>
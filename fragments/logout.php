<?php 
    //reset the login session and go back to login page
    session_start();
    session_destroy();
    header("location: ../index.php");
?>
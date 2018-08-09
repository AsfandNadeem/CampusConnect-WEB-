<?php 
    Session_start();

    session_destroy();
    
    header("LOCATION: ../index.php");
?>
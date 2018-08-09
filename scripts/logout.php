<?php
session_start();
unset($_SESSION["user"]);
    unset($_POST["login"]);
session_destroy();
   header('Location: ../index.php');
?>
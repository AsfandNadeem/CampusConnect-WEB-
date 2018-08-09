<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Pannel</title>

    <?php 
    include("/Includes/links.php");
    ?>
</head>
<body>
    
<?php session_start(); 
        if(!isset($_SESSION['user']))
        {
            header("LOCATION: index.php");
        }
?>

</body>
</html>
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <ul>
            <?php 
                if (isset($_SESSION["userId"])) {
            ?>
                <li><a href="./inc/logout.inc.php">LOGOUT</a></li>
            <?php 
                } else { 
            ?>
                <li><a href="#">LOGIN</a></li>
                <li><a href="#">SIGN UP</a></li>
            <?php 
                } 
            ?>
        </ul>
    </div>
</body>
</html>

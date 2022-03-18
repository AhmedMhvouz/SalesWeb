<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <?php

        include('server.php');
        if(isset($_SESSION['username'])){
            header('location: home.php');

        }
        
        
        
         ?>
        <a href="login.php">login</a>
        <a href="Register.php">register</a>
    </body>
</html>
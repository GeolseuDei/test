<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();

        if (!isset($_POST['secure'])) {
            $_SESSION['secure'] = rand(1000, 9999);
        } else {
            if ($_SESSION['secure'] == $_POST['secure']) {
                echo "SAMA!";
            } else {
                echo "TIDAK SAMA!";
                $_SESSION['secure'] = rand(1000, 9999);
            }
        }
        ?>
        <br>
        <img src ="generate.php" /> <br>

        <form action="index.php" method="POST">
            Type the value you see : 
            <input type="text" size="6" name="secure"> 
            <input type="submit" value="Submit">
        </form>
    </body>
</html>

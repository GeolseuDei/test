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
        //part of a file
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        //temporary directory uploaded file
        $tmp_name = $_FILES['file']['tmp_name'];
        //extension
        $extension = strtolower(substr($name, strpos($name, '.') + 1)); //substr after dot
        //directory upload
        $location = 'uploads/';
        //type of a file
        $typejpeg = 'image/jpeg';
        $typepng = 'image/png';
        $typegif = 'image/gif';
        //1 mb to byte
        $oneMegaByte = 1048576;

        if (isset($name)) {
            if (!empty($name)) {
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png') {
                    if ($type == $typejpeg || $type == $typepng || $type == $typegif) {
                        if ($size <= ($oneMegaByte * 2)) {
                            if (move_uploaded_file($tmp_name, $location . $name)) {
                                echo 'Uploaded!';
                            } else {
                                echo 'There was an error.';
                            }
                        } else {
                            echo 'Image size must not be more than 2mb';
                        }
                    } else {
                        echo 'File must be an image file';
                    }
                } else {
                    echo 'File must be an image file';
                }
            } else {
                echo 'Please choose a file';
            }
        }
        ?>

        <form action="index.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file"<br><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>

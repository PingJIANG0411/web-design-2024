<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!doctype html>
<html>
    <head>
        <title>Simpson Character</title>
        <style>
            body {
                font-family: Arial;
                margin: 0;
                padding: 0;
                text-align: center;
            }
            h1 {
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <h1>Which character you are?</h1>

        <?php
            if ($_COOKIE['character']) {
                print "You are ";
                print $_COOKIE['character']; 
                print '! <br>';
                echo '<img src="assignment07_images/' . $_COOKIE['character'] . '.png">';
            } 
            else {
                echo "No character result found.";
            }
        ?>
        <br>
        <a href = "clear.php">Try Again?</a>
 
        
    </body>
</html>

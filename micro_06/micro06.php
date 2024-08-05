<!doctype html>
<html>
    <head>
    </head>
    <body>
        <h1>Micro 6</h1>
        <form action = "micro06_process.php" method = "POST">
            <div>Username: <input type = "text" name = "name"></div>
            <div>Password: <input type = "text" name = "password"></div>
            <input type = "submit">
        </form>
        <?php
        if ($_GET['error'] == 'missingname'){
            print "<div> You forgot to type in the username.</div>";
        }
        if ($_GET['error'] == 'missingpassword'){
            print "<div> You forgot to type in the password.</div>";
        }
        if ($_GET['error'] == 'unmatched'){
            print "<div> Your username and password are unmatched.</div>";
        }
        if ($_GET['logged'] == 'true'){
            print "<div> You are logged in!</div>";
        }
        ?>
    </body>
</html>
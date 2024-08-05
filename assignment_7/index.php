<!doctype html>
<html>
    <head>
        <title>Macro 7</title>
        <style>
            body {
                font-family: Arial;
                background-color: lightgrey;
                margin: 0;
                padding: 0;
                text-align: center;
            }
            h1 {
                color: Black;
                margin-top: 50px;
            }
            form {
                margin-top: 10px;
                background-color: white;
                border-radius: 8px;
                padding: 20px;
                display: inline-block;
            }
            div {
                margin-bottom: 10px;
            }
            .error-message {
            color: red;
            font-style: italic;
            margin-top: 10px;
            }
            a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            }
        </style>
    </head>
    <body>
        <h1>Take My Quiz</h1>
    </body>

    <form action = "processresults.php" method = "POST">
        <div>
        What is your favorite color? 
                <select name = "color">
                    <option value = "unknown">Select a value</option>
                    <option value = "r">Red</option>
                    <option value = "b">Blue</option>
                    <option value = "g">Green</option>
                    <option value = "y">Yellow</option>
                </select>
        </div>
        <div>
            What is your favorite food? 
                <select name = "food">
                    <option value = "unknown">Select a value</option>
                    <option value = "p">Pizza</option>
                    <option value = "i">Ice Ccream</option>
                    <option value = "c">Coffee</option>
                    <option value = "b">Bagel</option>
                </select>
        </div>
        <div>
            What is your favorite hobby?  
                <select name = "hobby">
                    <option value = "unknown">Select a value</option>
                    <option value = "w">Watching TV</option>
                    <option value = "k">Knitting</option>
                    <option value = "s">Skateboarding</option>
                    <option value = "r">Reading</option>
                </select>
        </div>
        <div>
            What is your biggest fear?
                <select name = "fear">
                    <option value = "unknown">Select a value</option>
                    <option value = "s">Sock puppets</option>
                    <option value = "f">Flying</option>
                    <option value = "fl">I'm fearless, man</option>
                    <option value = "a">Getting anything below an A in school</option>
                </select>
        </div>
        <input type = "submit">
    </form>
    <a href="results.php">View Results</a>

    <?php 
    if ($_GET['error'] == 'missing'){
        print "<div class='error-message'> Fill all the questions!</div>";
    }

    if ($_COOKIE['character']){
        header("Location: quiz_results.php");
        exit();
    }
    ?>
</html>
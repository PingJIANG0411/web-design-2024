<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<?php

$name = $_POST['name'];
$password = $_POST['password'];

if (!$name){
    header("Location: micro06.php?error=missingname");
    exit();
}

if (!$password){
    header("Location: micro06.php?error=missingpassword");
    exit();
}

if ($name != 'pikachu' || $password != 'pokemon'){
    header("Location: micro06.php?error=unmatched");
    exit();
}
if ($name == 'pikachu' && $password == 'pokemon'){
    header("Location: micro06.php?logged=true");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Movie</title>
</head>
<body>
    <header>
        <h1>My Movie Database</h1>
        <ul>
            <li><a href="index.php">View All</a></li>
            <li><a href="add_save.php">Add Movie</a></li>
            <li><a href="search_results.php">Search Movies</a></li>
        </ul>
    </header>
    <form method="post" action="add_save.php" >
        <p>Title:</p>
        <input type="text" id="title" name="title"><br>
        <p>Year:</p>
        <input type="number" id="year" name="year"><br>
        <button type="submit">Save</button>
    </form>
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'add') {
          print "<p>Movie Added!</p>";
        }
    }
    ?>
    
</body>
</html>

<?php

include('db_connection.php');
$db = new SQLite3($path.'/movie.db');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$title = $_POST['title'];
$year = $_POST['year'];

if (strlen($title) == 0 || strlen($year) == 0) {
    echo "Fill in the form.";
    exit(); 
}

$sql = "INSERT INTO movies (title, year) VALUES (:title, :year)";
$statement = $db->prepare($sql);
$statement->bindValue(':title', $title);
$statement->bindValue(':year', $year);

$result = $statement->execute();
$db->close();
unset($db);


header("Location: add_save.php?status=add");
exit();

}
?>

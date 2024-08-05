<!DOCTYPE html>
<html>
<head>
    <title>Search Movies</title>
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
    <form action="search_results.php" method="get">
        <p>Title:</p>
        <input type="text" id="title" name="title"><br>
        <p>Year:</p>
        <input type="number" id="year" name="year"><br>
        <button type="submit">Search</button>
    </form>
</body>
</html>

<?php
include ('db_connection.php');
$db = new SQLite3($path.'/movie.db');
$title = $_GET['title'];
$year = $_GET['year'];

if (strlen($title) > 0 && strlen($year) == 0) {
    $sql = "SELECT * FROM movies WHERE title LIKE :title";
}
else if (strlen($title) == 0 && strlen($year) > 0){
    $sql = "SELECT * FROM movies WHERE year = :year";
}
else if (strlen($title) > 0 && strlen($year) > 0){
    $sql = "SELECT * FROM movies WHERE title LIKE :title AND year = :year";
}
else{
    exit();
}


$statement = $db->prepare($sql);

$statement->bindValue(':title', '%' .$title. '%');
$statement->bindValue(':year', $year);

$result = $statement->execute();

if ($result) {
    echo "<ul>";
    while ($row = $result->fetchArray()) {
        $id = $row[0];
        $title = stripslashes($row[1]);
        $year = $row[2];
        echo "<li>$title - $year</li>";
    }
    echo "</ul>";
} 
else {
    echo "No results found.";
}

$db->close();
unset($db);
?>

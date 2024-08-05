<!DOCTYPE html>
<html>
<head>
    <title>Movie Database</title>
</head>
<body>
    <h1>My Movie Database</h1>
    
        <ul>
            <li><a href="index.php">View All</a></li>
            <li><a href="add_save.php">Add Movie</a></li>
            <li><a href="search_results.php">Search Movies</a></li>
        </ul>

        <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'deleted') {
          print "<p>Movie Deleted!</p>";
        }
    }
    ?>
        <table border="1">
        <tr>
            <th>Title</th>
            <th>Year</th>
            <th>Option</th>
        </tr>

        <?php
        include('db_connection.php');
        $db = new SQLite3($path.'/movie.db');
        $sql = 'SELECT id, title, year FROM movies';
        $result = $db->query($sql);

        while ($row = $result->fetchArray()) {
            $id = $row['id'];
            $title = stripslashes($row['title']);
            $year = $row['year'];
            echo "<tr>";
            echo "<td>$title</td>";
            echo "<td>$year</td>";
            echo "<td><a href=\"delete.php?id=$id\">Delete</a></td>";
            echo "</tr>";
        }
        $db->close();
        unset($db);
        ?>
    </ul>
</body>
</html>

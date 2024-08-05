<?php
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
include('db_connection.php');
$db = new SQLite3($path.'/movie.db');

$sql = "DELETE FROM movies WHERE id = :id";
$statement = $db->prepare($sql);
$statement->bindValue(':id', $id);
$result = $statement->execute();
$db->close();
unset($db);

header("Location: index.php?status=deleted");
?>

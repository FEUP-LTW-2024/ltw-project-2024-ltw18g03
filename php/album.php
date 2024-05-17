<?php
  try
{
//open the database
require_once(__DIR__ . '/../db/connection.db.php');
$db = getDBConn();



$title = $_POST['title'];
$artist = $_POST['artist'];
$year = $_POST['year'];
$cover = $_POST['cover'];
$genre = $_POST['genre'];
$rating = $_POST['rating'];


//Sanitize the inputs
$title = preg_replace ("/[^a-zA-Z0-9\s]/", '', $title);
$artist = preg_replace ("/[^a-zA-Z0-9\s]/", '', $artist);
$year = preg_replace ("/[^0-9]/", '', $year);
$rating = preg_replace ("/[^0-9.]/", '', $rating);
$genre = preg_replace ("/[^a-zA-Z\s,]/", '', $genre);

//Insert record  

$db->exec("INSERT INTO Album (title, artist, yearOfRelease, cover,  genre, rym, quantity, averagePrice)
VALUES('$title', '$artist', '$year', '$cover', '$genre', '$rating', 0, 0.0);");



header('Location: ../');

}
catch(PDOException $e)
{
print 'Exception : ' .$e->getMessage();
}

?>

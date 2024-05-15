<?php
  try
{
//open the database
require_once(__DIR__ . '/../db/connection.db.php');
$db = getDBConn();



$title = $_POST['title'];
$description = $_POST['description'];
$album = $_POST['album'];
$price = $_POST['price'];
$condition = $_POST['condition'];
$seller = $_POST['seller'];


//Sanitize the inputs
$title = preg_replace ("/[^a-zA-Z\s]/", '', $title);
$description = preg_replace ("/[^a-zA-Z\s]/", '', $description);
$album = preg_replace ("/[^a-zA-Z\s]/", '', $album);
$price = preg_replace ("/[^0-9.]/", '', $price);
$condition = preg_replace ("/[^a-zA-Z\s]/", '', $condition);

//Insert record  

$db->exec("INSERT INTO Item (title, descriptionOfItem, price, condition,  seller, album)
VALUES('$title', '$description', '$price', '$condition', '$seller', '$album');");



header('Location: ../');

}
catch(PDOException $e)
{
print 'Exception : ' .$e->getMessage();
}

?>

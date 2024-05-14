<?php
  try
{
//open the database
require_once(__DIR__ . '/../db/connection.db.php');
$db = getDBConn();

$userID = $_POST['user'];
$albumID = $_POST['album'];


//Insert record  
if ()
$db->exec("INSERT INTO Wishlist (userID, albumID)
VALUES('$userID', '$albumID');");



header('Location: ../');

}
catch(PDOException $e)
{
print 'Exception : ' .$e->getMessage();
}

?>
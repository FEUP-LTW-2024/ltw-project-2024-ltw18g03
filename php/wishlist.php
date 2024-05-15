<?php
  try
{
  require_once(__DIR__ . '/../php/session.php');
    $session = new Session();
//open the database
require_once(__DIR__ . '/../db/connection.db.php');
$db = getDBConn();
if (!$session->isLoggedIn()) {
  header('Location: ../pages/login.php');
  exit();
}
$userID = $_POST['user'];
$albumID = $_POST['album'];

// Check if the wishlist item already exists
$stmt = $db->prepare("SELECT COUNT(*) FROM Wishlist WHERE userID = :userID AND albumID = :albumID");
$stmt->bindParam(':userID', $userID);
$stmt->bindParam(':albumID', $albumID);
$stmt->execute();
$count = $stmt->fetchColumn();

if ($count == 0) {
  $db->exec("INSERT INTO Wishlist (userID, albumID)
  VALUES('$userID', '$albumID');");
  header('Location: ../');
}
else {
  header('Location: ../');
}

// Wishlist item does not exist, proceed with inserting the record






}
catch(PDOException $e)
{
print 'Exception : ' .$e->getMessage();
}

?>
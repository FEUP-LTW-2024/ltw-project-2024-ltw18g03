<?php
  try
{
//open the database
require_once(__DIR__ . '/../db/connection.db.php');
$db = getDBConn();



$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$city = $_POST['city'];
$postalCode = $_POST['postal'];
$phone = $_POST['phone'];


//Insert record  

$db->exec("INSERT INTO User (firstName, lastName, profilePicture, city, postalCode, phone, email, passwordHash, isAdmin)
VALUES('$firstname', '$lastname', 1, '$city', '$postalCode', '$phone', '$phone', '$password', FALSE);");



header('Location: ../');

}
catch(PDOException $e)
{
print 'Exception : ' .$e->getMessage();
}

?>

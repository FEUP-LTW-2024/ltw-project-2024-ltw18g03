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
$profilePic = $_POST['profilePicture'];

//Sanitize the inputs
$firstname = preg_replace ("/[^a-zA-Z\s]/", '', $firstname);
$lastname = preg_replace ("/[^a-zA-Z\s]/", '', $lastname);
$email = preg_replace("/[^a-zA-Z0-9.@_+-]/", '', $email);
$city = preg_replace ("/[^a-zA-Z\s]/", '', $city);
$postalCode = preg_replace ("/[^a-zA-Z0-9\s-]/", '', $postalCode);
$phone = preg_replace ("/[^0-9\s]/", '', $phone);
$profilePic = preg_replace ("/[^a-zA-Z]/", '', $profilePic);

//Hash the password before storing
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$email = strtolower($email);

$admin = false;
if (strpos($email, '@admin') !== false) {
  $admin = true;
}
//Insert record  

$db->exec("INSERT INTO User (firstName, lastName, profilePicture, city, postalCode, phone, email, passwordHash, isAdmin)
VALUES('$firstname', '$lastname', '$profilePic', '$city', '$postalCode', '$phone', '$email', '$passwordHash', '$admin');");



header('Location: ../');

}
catch(PDOException $e)
{
print 'Exception : ' .$e->getMessage();
}

?>

<?php
  try
{
//open the database
require_once(__DIR__ . '/../db/connection.db.php');
$db = getDBConn();



$sender = $_POST['senderID'];
$receiver = $_POST['receiverID'];
$item = $_POST['itemID'];
$title = $_POST['title'];
$email_body = $_POST['content'];


//Sanitize the inputs
$sender = preg_replace ("/[^0-9]/", '', $sender);
$receiver = preg_replace ("/[^0-9]/", '', $receiver);
$item = preg_replace ("/[^0-9]/", '', $item);
$title = preg_replace ("/[^a-zA-Z0-9\s.:]/", '', $title);

$email_body = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $email_body);

$email_body = preg_replace('/on\w+="[^"]*"/i', '', $email_body);
$email_body = preg_replace('/on\w+=\'[^\']*\'/i', '', $email_body);
$email_body = preg_replace('/on\w+=[^\s>]+/i', '', $email_body);

$email_body = htmlspecialchars($email_body, ENT_QUOTES, 'UTF-8');

$email_body = strip_tags($email_body);

//Insert record  

$db->exec("INSERT INTO Mail (senderID, receiverID, itemID, title, content)
VALUES('$sender', '$receiver', '$item', '$title', '$email_body');");



header('Location: ../');

}
catch(PDOException $e)
{
print 'Exception : ' .$e->getMessage();
}

?>

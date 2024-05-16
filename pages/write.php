<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../php/session.php');
  $session = new Session();


  require_once(__DIR__ . '/../db/connection.db.php');
  $db = getDBConn();

  require_once(__DIR__ . '/../db/class.mail.php');

  require_once(__DIR__ . '/../html/html.main.php');
  require_once(__DIR__ . '/../html/html.albums.php');
  require_once(__DIR__ . '/../html/html.user.php');
  require_once(__DIR__ . '/../html/html.items.php');
  require_once(__DIR__ . '/../html/html.mail.php');

$itemID = $_POST['itemId'];
$receiverID = $_POST['dest'];
$title = $_POST['title'];

  drawHeaderMail($session);
  if ($_POST['title'] != null) {
  drawReply($session, $itemID, $receiverID, $title);}
    else drawSend($session, $itemID, $receiverID);
  drawFooter();
?>
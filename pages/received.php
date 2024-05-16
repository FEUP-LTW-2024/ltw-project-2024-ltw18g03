<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../php/session.php');
  $session = new Session();


  require_once(__DIR__ . '/../db/connection.db.php');
  $db = getDBConn();

  require_once(__DIR__ . '/../db/class.mail.php');
  $mails = Mail::getReceivedMails($db, $session->getId());

  require_once(__DIR__ . '/../html/html.main.php');
  require_once(__DIR__ . '/../html/html.albums.php');
  require_once(__DIR__ . '/../html/html.user.php');
  require_once(__DIR__ . '/../html/html.mail.php');

    drawHeaderReceived($session);
    drawReceivedMail($mails, $session);
    drawFooter();
?>

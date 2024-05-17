<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../php/session.php');
  $session = new Session();


  require_once(__DIR__ . '/../db/connection.db.php');
  $db = getDBConn();

  require_once(__DIR__ . '/../db/class.album.php');
  require_once(__DIR__ . '/../db/class.user.php');
  require_once(__DIR__ . '/../db/class.item.php');

  require_once(__DIR__ . '/../html/html.main.php');
  require_once(__DIR__ . '/../html/html.albums.php');
  require_once(__DIR__ . '/../html/html.user.php');
  require_once(__DIR__ . '/../html/html.items.php');
  
    drawHeader($session);
    drawConfirm($session, $_POST['itemId']);
    drawFooter();
?>
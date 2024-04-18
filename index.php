<?php
  declare(strict_types = 1);

  require_once('php/session.php');
  $session = new Session();


  require_once('db/connection.db.php');
  $db = getDBConn();

  require_once('html/main.html.php');
  drawHeader($session);
  drawBanner();
  drawFooter();
?>
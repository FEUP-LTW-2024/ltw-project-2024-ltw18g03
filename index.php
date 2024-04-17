<?php
  declare(strict_types = 1);

  require_once('php/session.php');
  $session = new Session();


  require_once('html/main.html.php');



  drawHeader($session);
  drawFooter();
?>
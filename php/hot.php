<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../php/session.php');
  $session = new Session();


  require_once(__DIR__ . '/../db/connection.db.php');
  $db = getDBConn();

  require_once(__DIR__ . '/../db/album.class.php');
  $albums = Album::getAlbums($db);

  require_once(__DIR__ . '/../html/main.html.php');
  require_once(__DIR__ . '/../html/albums.html.php');
  drawHeader($session);
  drawHot($albums, 30);

  drawFooter();
?>
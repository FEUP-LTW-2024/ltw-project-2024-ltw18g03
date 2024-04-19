<?php
  declare(strict_types = 1);

  require_once('php/session.php');
  $session = new Session();


  require_once('db/connection.db.php');
  $db = getDBConn();

  require_once('db/album.class.php');
  $albums = Album::getAlbums($db);

  require_once('html/main.html.php');
  require_once('html/albums.html.php');
  drawHeader($session);
  drawBanner();
  drawTop($albums);
  drawTop($albums);
  drawTop($albums);
  drawTop($albums);

  drawFooter();
?>
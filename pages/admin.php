<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../php/session.php');
  $session = new Session();


  require_once(__DIR__ . '/../db/connection.db.php');
  $db = getDBConn();

  require_once(__DIR__ . '/../db/class.user.php');
  require_once(__DIR__ . '/../db/class.album.php');
  $users = User::getUsers($db);
  $albums = Album::getAlbums($db);

  require_once(__DIR__ . '/../html/html.main.php');
  require_once(__DIR__ . '/../html/html.albums.php');
  require_once(__DIR__ . '/../html/html.user.php');

  drawHeaderAdmin($session);
  drawUsers($session, $users);
  drawAlbums($session, $albums);

  drawFooter();
?>
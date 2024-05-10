<?php
    declare(strict_types = 1);
    require_once(__DIR__ . '/../php/session.php');
    $session = new Session();
    require_once(__DIR__ . '/../db/connection.db.php');
    $db = getDBConn();
    require_once(__DIR__ . '/../db/class.album.php');
    $albums = Album::getAlbums($db);
    $album = Album::getAlbumByID($db, $_GET['id']);
    require_once(__DIR__ . '/../html/html.albums.php');
    require_once(__DIR__ . '/../html/html.main.php');
    require_once(__DIR__ . '/../html/html.user.php');
    drawHeaderAlbum($session, $album);
    drawBuy($session, $album);
    drawFooter();
    
?>
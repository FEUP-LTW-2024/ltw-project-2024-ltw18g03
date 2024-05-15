<?php

    declare(strict_types = 1);

    require_once(__DIR__ . '/../php/session.php');
    $session = new Session();


    require_once(__DIR__ . '/../db/connection.db.php');
    $db = getDBConn();

    require_once(__DIR__ . '/../db/class.album.php');
    
    $query = isset($_GET['query']) ? $_GET['query'] : '';
    //var_dump($query);

    $result = Album::searchAlbums($db, $query);
    
    require_once(__DIR__ . '/../html/html.main.php');
    require_once(__DIR__ . '/../html/html.albums.php');   
    require_once(__DIR__ . '/../html/html.user.php'); 

    drawHeader($session);

    drawRes($result, $session);

    drawFooter();

?>

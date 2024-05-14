<?php

require_once(__DIR__ . '/../db/class.album.php');
require_once(__DIR__ . '/../db/class.item.php');

if(isset($_GET['query']) && !empty($_GET['query'])) {
    $query = $_GET['query'];

    $db = getDBConn();

    $albums = Album::searchAlbums($db, $query);

    
    $items = Item::searchItems($db, $query);

    
    $results = array_merge($albums, $items);

   
    header('Content-Type: application/json');
    echo json_encode($results);

} else {
    
    echo json_encode([]);
}
?>

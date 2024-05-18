<?php
try {
    // Open the database
    require_once(__DIR__ . '/../db/connection.db.php');
    require_once(__DIR__ . '/../html/html.items.php');
    $db = getDBConn();

    $item = $_POST['itemID'];
    $buyer = $_POST['buyerID'];
    $album = $_POST['albumID'];
    $time = $_POST['time'];

    // Update Item table
    $sqlItem = "UPDATE Item SET sold = TRUE, buyer = ? WHERE ID = ?";
    $paramsItem = [$buyer, $item];
    $stmtItem = $db->prepare($sqlItem);
    $stmtItem->execute($paramsItem);

    // Decrement album quantity
    $sqlAlbum = "UPDATE Album SET quantity = quantity - 1 WHERE ID = ?";
    $paramsAlbum = [$album];
    $stmtAlbum = $db->prepare($sqlAlbum);
    $stmtAlbum->execute($paramsAlbum);
    
    // Find the cheapest price on all items from the album
    $sqlCheapestPrice = "SELECT MIN(price) AS minPrice FROM Item WHERE album = ? AND sold = FALSE";
    $paramsCheapestPrice = [$album];
    $stmtCheapestPrice = $db->prepare($sqlCheapestPrice);
    $stmtCheapestPrice->execute($paramsCheapestPrice);
    $resultCheapestPrice = $stmtCheapestPrice->fetch(PDO::FETCH_ASSOC);
    $minPrice = $resultCheapestPrice['minPrice'];

    // Update the minPrice entry in the Album table
    $sqlUpdateMinPrice = "UPDATE Album SET minPrice = ? WHERE ID = ?";
    $paramsUpdateMinPrice = [$minPrice, $album];
    $stmtUpdateMinPrice = $db->prepare($sqlUpdateMinPrice);
    $stmtUpdateMinPrice->execute($paramsUpdateMinPrice);

    drawReceiptHeader();
    drawReceipt($item, $time);
} catch (PDOException $e) {
    print 'Exception : ' . $e->getMessage();
}
?>
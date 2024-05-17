<?php
try {
    // Open the database
    require_once(__DIR__ . '/../db/connection.db.php');
    require_once(__DIR__ . '/../html/html.items.php');
    $db = getDBConn();

    $item = $_POST['itemID'];
    $user = $_POST['userID'];
    $time = $_POST['time'];


    $sql = "UPDATE Item SET sold = TRUE, buyer = ? WHERE ID = ?";
    $params = [$user, $item];

    // Prepare and execute the statement
    $stmt = $db->prepare($sql);
    $stmt->execute($params);

  // Prepare and execute the statement
  $stmt = $db->prepare($sql);
  $stmt->execute($params);
    
    drawReceiptHeader();
    drawReceipt($item, $time);
} catch (PDOException $e) {
    print 'Exception : ' . $e->getMessage();
}
?>

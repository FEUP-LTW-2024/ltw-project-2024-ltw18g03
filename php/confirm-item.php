<?php
try {
    // Open the database
    require_once(__DIR__ . '/../db/connection.db.php');
    require_once(__DIR__ . '/../html/html.items.php');
    $db = getDBConn();

    $itemID = $_POST['itemID'];
    $buyerID = $_POST['buyerID'];
    $albumID = $_POST['albumID'];
    $time = $_POST['time'];
    $referralCode = $_POST['referralCode'];

    // Fetch item price
    $stmt = $db->prepare('SELECT price FROM Item WHERE ID = ?');
    $stmt->execute([$itemID]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    $itemPrice = $item['price'];

    // Check referral code and get discount
    $discount = 0;
    if (!empty($referralCode)) {
        $stmt = $db->prepare('SELECT discount FROM ReferralCodes WHERE code = ? AND valid = 1');
        $stmt->execute([$referralCode]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $discount = $result['discount'];
            // Invalidate the referral code if used (optional)
            $updateStmt = $db->prepare('UPDATE ReferralCodes SET valid = 0 WHERE code = ?');
            $updateStmt->execute([$referralCode]);
        }
    }

    $finalPrice = $itemPrice - $discount + 2.99; // Item price - discount + shipping

    // Update Item table
    $sqlItem = "UPDATE Item SET sold = TRUE, buyer = ? WHERE ID = ?";
    $paramsItem = [$buyerID, $itemID];
    $stmtItem = $db->prepare($sqlItem);
    $stmtItem->execute($paramsItem);

    // Decrement album quantity
    $sqlAlbum = "UPDATE Album SET quantity = quantity - 1 WHERE ID = ?";
    $paramsAlbum = [$albumID];
    $stmtAlbum = $db->prepare($sqlAlbum);
    $stmtAlbum->execute($paramsAlbum);
    
    // Find the cheapest price on all items from the album
    $sqlCheapestPrice = "SELECT MIN(price) AS minPrice FROM Item WHERE album = ? AND sold = FALSE";
    $paramsCheapestPrice = [$albumID];
    $stmtCheapestPrice = $db->prepare($sqlCheapestPrice);
    $stmtCheapestPrice->execute($paramsCheapestPrice);
    $resultCheapestPrice = $stmtCheapestPrice->fetch(PDO::FETCH_ASSOC);
    $minPrice = $resultCheapestPrice['minPrice'];

    // Update the minPrice entry in the Album table
    $sqlUpdateMinPrice = "UPDATE Album SET minPrice = ? WHERE ID = ?";
    $paramsUpdateMinPrice = [$minPrice, $albumID];
    $stmtUpdateMinPrice = $db->prepare($sqlUpdateMinPrice);
    $stmtUpdateMinPrice->execute($paramsUpdateMinPrice);

    drawReceiptHeader();
    drawReceipt($itemID, $time, $finalPrice); // Include final
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
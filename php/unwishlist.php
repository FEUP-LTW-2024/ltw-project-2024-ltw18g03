<?php
    require_once(__DIR__ . '/../db/connection.db.php');

    // Database connection
    $db = getDBConn();

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get item ID from form
        $userID = $_POST['user'];
        $albumID = $_POST['album'];

        // Prepare DELETE statement
        $stmt = $db->prepare("DELETE FROM Wishlist WHERE userID = :userid AND albumID = :albumid");

        // Bind parameters
        $stmt->bindParam(':userid', $userID);
        $stmt->bindParam(':albumid', $albumID);

        // Execute the statement
        $stmt->execute();


        header('Location: ../pages/wishlist.php');

    }
    
?>
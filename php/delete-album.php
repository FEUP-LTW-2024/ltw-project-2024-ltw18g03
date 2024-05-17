<?php
    require_once(__DIR__ . '/../db/connection.db.php');

    // Database connection
    $db = getDBConn();

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get album ID from form
        $album_id = $_POST['album_id'];

        // Prepare DELETE statements
        $delete_album_stmt = $db->prepare("DELETE FROM Album WHERE ID = :id");
        $delete_item_stmt = $db->prepare("DELETE FROM Item WHERE album = :id");
        $delete_wishlist_stmt = $db->prepare("DELETE FROM Wishlist WHERE albumID = :id");

        // Bind parameters
        $delete_album_stmt->bindParam(':id', $album_id);
        $delete_item_stmt->bindParam(':id', $album_id);
        $delete_wishlist_stmt->bindParam(':id', $album_id);

        // Execute the statements
        $delete_album_stmt->execute();
        $delete_item_stmt->execute();
        $delete_wishlist_stmt->execute();

        header('Location: ../pages/admin.php');
    }
?>
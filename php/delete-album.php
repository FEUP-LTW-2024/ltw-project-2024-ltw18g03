<?php
    require_once(__DIR__ . '/../db/connection.db.php');

    // Database connection
    $db = getDBConn();

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get item ID from form
        $album_id = $_POST['album_id'];

        // Prepare DELETE statement
        $stmt = $db->prepare("DELETE FROM Album WHERE ID = :id");

        // Bind parameters
        $stmt->bindParam(':id', $album_id);

        // Execute the statement
        $stmt->execute();


        header('Location: ../pages/admin.php');

    }
    
?>
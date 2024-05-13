<?php
    require_once(__DIR__ . '/../db/connection.db.php');

    // Database connection
    $db = getDBConn();

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get item ID from form
        $item_id = $_POST['item_id'];

        // Prepare DELETE statement
        $stmt = $db->prepare("DELETE FROM Item WHERE ID = :id");

        // Bind parameters
        $stmt->bindParam(':id', $item_id);

        // Execute the statement
        $stmt->execute();


        header('Location: ../pages/profile.php');

    }
    
?>
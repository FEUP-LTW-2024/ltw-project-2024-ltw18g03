<?php
    require_once(__DIR__ . '/../db/connection.db.php');

    // Database connection
    $db = getDBConn();

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get user ID from form
        $user_id = $_POST['user_id'];

        // Prepare DELETE statement for User table
        $stmt_user = $db->prepare("DELETE FROM User WHERE ID = :id");

        // Prepare DELETE statement for Item table
        $stmt_item = $db->prepare("DELETE FROM Item WHERE seller = :id");

        // Bind parameters for User table
        $stmt_user->bindParam(':id', $user_id);

        // Bind parameters for Item table
        $stmt_item->bindParam(':id', $user_id);

        // Execute the statements
        $stmt_user->execute();
        $stmt_item->execute();

        header('Location: ../pages/admin.php');
    }
?>
<?php
    require_once(__DIR__ . '/../db/connection.db.php');

    // Database connection
    $db = getDBConn();

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get item ID from form
        $user_id = $_POST['user_id'];

        // Prepare DELETE statement
        $stmt = $db->prepare("DELETE FROM User WHERE ID = :id");

        // Bind parameters
        $stmt->bindParam(':id', $user_id);

        // Execute the statement
        $stmt->execute();


        header('Location: ../pages/admin.php');

    }
    
?>
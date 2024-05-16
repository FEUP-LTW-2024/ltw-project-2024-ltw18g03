<?php
try {
    // Open the database
    require_once(__DIR__ . '/../db/connection.db.php');
    $db = getDBConn();
    // Assuming you have already established a PDO database connection

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the user ID from the POST request
        $userId = $_POST['user_id'];

        // Set the admin status to true
        $admin = true;

        // Prepare the SQL statement
        $sql = "UPDATE User SET isAdmin = :admin WHERE ID = :id";

        // Prepare the PDO statement
        $stmt = $db->prepare($sql);

        // Bind the parameters
        $stmt->bindParam(':admin', $admin, PDO::PARAM_BOOL);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

        // Execute the statement
        if ($stmt->execute()) {
            echo "User with ID $userId has been updated as admin.";
        } else {
            echo "Failed to update user as admin.";
        }
        header('Location: ../pages/admin.php');
    }
} catch (PDOException $e) {
    print 'Exception : ' . $e->getMessage();
}
?>
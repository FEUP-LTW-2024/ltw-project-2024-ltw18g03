<?php
try {
    // Open the database
    require_once(__DIR__ . '/../db/connection.db.php');
    $db = getDBConn();

    $id = $_POST['item'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $condition = $_POST['condition'];

    // Initialize an array to hold the SQL parts
    $sqlParts = [];
    $params = [];

    // Dynamically build the SQL query based on provided inputs
    if (!empty($title)) {
        $sqlParts[] = "title = ?";
        $params[] = $title;
    }
    if (!empty($description)) {
        $sqlParts[] = "descriptionOfItem = ?";
        $params[] = $description;
    }
    if (!empty($price)) {
        $sqlParts[] = "price = ?";
        $params[] = $price;
    }
    if (!empty($condition)) {
        $sqlParts[] = "condition = ?";
        $params[] = $condition;
    }

    // Only proceed if there are parts to update
    if (!empty($sqlParts)) {
        $sql = "UPDATE Item SET " . implode(', ', $sqlParts) . " WHERE ID = ?";
        $params[] = $id; // Add the id to the parameters

        // Prepare and execute the statement
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
    }

    header('Location: ../');
} catch (PDOException $e) {
    print 'Exception : ' . $e->getMessage();
}
?>

<?php
try {
    // Open the database
    require_once(__DIR__ . '/../db/connection.db.php');
    $db = getDBConn();

    $id = $_POST['user'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Consider hashing the password before storing
    $city = $_POST['city'];
    $postalCode = $_POST['postal'];
    $phone = $_POST['phone'];
    $profilePic = $_POST['profilePicture'];

    // Initialize an array to hold the SQL parts
    $sqlParts = [];
    $params = [];

    // Dynamically build the SQL query based on provided inputs
    if (!empty($firstname)) {
        $sqlParts[] = "firstName = ?";
        $params[] = $firstname;
    }
    if (!empty($lastname)) {
        $sqlParts[] = "lastName = ?";
        $params[] = $lastname;
    }
    if (!empty($email)) {
        $sqlParts[] = "email = ?";
        $params[] = $email;
    }
    if (!empty($password)) {
        // Hash the password before storing
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sqlParts[] = "passwordHash = ?";
        $params[] = $hashedPassword;
    }
    if (!empty($city)) {
        $sqlParts[] = "city = ?";
        $params[] = $city;
    }
    if (!empty($postalCode)) {
        $sqlParts[] = "postalCode = ?";
        $params[] = $postalCode;
    }
    if (!empty($phone)) {
        $sqlParts[] = "phone = ?";
        $params[] = $phone;
    }
    if (!empty($profilePic)) {
        $sqlParts[] = "profilePicture = ?";
        $params[] = $profilePic;
    }

    // Only proceed if there are parts to update
    if (!empty($sqlParts)) {
        $sql = "UPDATE User SET " . implode(', ', $sqlParts) . " WHERE ID = ?";
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
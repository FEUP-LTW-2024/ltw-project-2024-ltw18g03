<?php
class User {
    public $id;
    public $firstName;
    public $lastName;
    public $profilePicture = 1; // Default profile picture ID
    public $city;
    public $postalCode;
    public $phone;
    public $email;
    public $passwordHash;
    public $isAdmin = false;
    public $joinDate;

    public function __construct($firstName, $lastName, $city, $postalCode, $phone, $email, $passwordHash, $isAdmin = false, $joinDate = null) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->phone = $phone;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->isAdmin = $isAdmin;
        $this->joinDate = $joinDate ?: date('Y-m-d');
    }
    static function getUsers($db) {
        // Query to retrieve users from the database
        $query = "SELECT * FROM User";
    
        // Execute the query
        $result = $db->query($query);
    
        // Initialize an empty array to store users
        $users = [];
    
        // Fetch users from the result set
        while ($row = $result->fetch()) {
            // Create an User object for each row and add it to the users array
            $user = new User($row['ID'], $row['firstName'], $row['lastName'], $row['profilePicture'], $row['city'], $row['postalCode'], $row['phone'], $row['email'], $row['passwordHash'], $row['isAdmin'], $row['joinDate']);
            $users[] = $user;
        }
    
        // Close the result set
        $result->closeCursor();
    
        // Return the array of users
        return $users;
    }
}

?>


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

    public function __construct($id, $firstName, $lastName, $profilePicture, $city, $postalCode, $phone, $email, $passwordHash, $isAdmin = false, $joinDate = null) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->profilePicture = $profilePicture;
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
    static function getUserWithPassword(PDO $db, string $email, string $password) : ?User {
        $stmt = $db->prepare('
          SELECT ID, firstName, lastName, profilePicture, city, postalCode, phone, email, passwordHash, isAdmin, joinDate
          FROM User 
          WHERE lower(email) = ? AND passwordHash = ?
        ');
  
        $stmt->execute(array(strtolower($email), $password));
    
        if ($user = $stmt->fetch()) {
          return new User(
            $user['ID'],
            $user['firstName'],
            $user['lastName'],
            $user['profilePicture'],
            $user['city'],
            $user['postalCode'],
            $user['phone'],
            $user['email'],
            $user['isAdmin'],
            $user['joinDate'],

          );
        } else return null;
      }
      function name() {
        return $this->firstName . ' ' . $this->lastName;
      }
      static function getUser(PDO $db, Session $session) : ?User {
        $idu = $session->getId();
        $stmt = $db->prepare('
          SELECT ID, firstName, lastName, profilePicture, city, postalCode, phone, email, passwordHash, isAdmin, joinDate
          FROM User 
          WHERE ID = ?
        ');
  
        $stmt->execute(array($idu));
        if ($user = $stmt->fetch()) {
          return new User(
            $user['ID'],
            $user['firstName'],
            $user['lastName'],
            $user['profilePicture'],
            $user['city'],
            $user['postalCode'],
            $user['phone'],
            $user['email'],
            $user['isAdmin'],
            $user['joinDate'],

          );
        } else return null;
      
      }
      static function getUserByID($db, $id) {
        $query = "SELECT * FROM User WHERE ID = :id";
    
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
    
        $row = $statement->fetch();
    
        if ($row) {
            return new User($row['ID'], $row['firstName'], $row['lastName'], $row['profilePicture'], $row['city'], $row['postalCode'], $row['phone'], $row['email'], $row['passwordHash'], $row['isAdmin'], $row['joinDate']);
        } else {
            return null;
        }
      }
}

?>


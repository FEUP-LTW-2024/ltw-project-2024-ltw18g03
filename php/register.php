<?php
     
	//including the database connection
   	require_once(__DIR__ . '/../php/session.php');
    $session = new Session();


    require_once(__DIR__ . '/../db/connection.db.php');
    $db = getDBConn();

    require_once(__DIR__ . '/../db/class.user.php');
   
  	if(ISSET($_POST['register'])){
 		// Setting variables
  		$firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
  		$password = $_POST['password'];
  		$city = $_POST['city'];
   		$postalCode = $_POST['postal'];
        $phone = $_POST['phone'];
    
   		// Insertion Query
  		$query = "INSERT INTO User (firstName, lastName, profilePicture, city, postalCode, phone, email, passwordHash, isAdmin)
            VALUES(:fn, :ln, 1,:ct, :pc, :ph, :em, :pw, FALSE)";
   		$stmt = $db->prepare($query);
   		$stmt->bindParam(':fn', $firstname);
   		$stmt->bindParam(':ln', $lastname);
   		$stmt->bindParam(':em', $email);
   		$stmt->bindParam(':pw', $password);
        $stmt->bindParam(':ct', $city);
   		$stmt->bindParam(':pc', $postalCode);
   		$stmt->bindParam(':ph', $phone);

    
   		// Check if the execution of query is success
   		if($stmt->execute()){
   			//setting a 'success' session to save our insertion success message.
   			$_SESSION['success'] = "Successfully created an account";
    
   			//redirecting to the index.php 
   			header('location: pages');
   		}
    }
?>
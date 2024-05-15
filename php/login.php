<?php
    declare(strict_types = 1);
    require_once(__DIR__ . '/../php/session.php');
    $session = new Session();

    require_once(__DIR__ . '/../db/connection.db.php');
    $db = getDBConn();
    require_once(__DIR__ . '/../db/class.user.php');
    $password = $_POST['password'];
    $email = strtolower($_POST['email']);



    $user = User::getUserByEmail($db, $email);
    if (!$user) {
      $session->addMessage('error', 'Email Not Found!');
      echo "Email Not Found:\n";
      echo $email;
    }

    if (password_verify($password, $user->passwordHash)) {



    $user1 = User::getUserByEmail($db, $email);

    if ($user1) {
      $session->setId($user1->id);
      $session->setName($user1->name());
      $session->addMessage('success', 'Login successful!');
      header('Location: ' . '../pages/index.php');
    } else {
      $session->addMessage('error', 'Wrong password!');
      echo "wrong password:\n";
      echo $password;
        }
      } else {
        $session->addMessage('error', 'Wrong password!');
        echo "wrong password:\n";
        echo $password;
      }

   
?>
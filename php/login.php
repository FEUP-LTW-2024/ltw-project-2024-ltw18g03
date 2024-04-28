<?php
    declare(strict_types = 1);
    require_once(__DIR__ . '/../php/session.php');
    $session = new Session();

    require_once(__DIR__ . '/../db/connection.db.php');
    $db = getDBConn();
    require_once(__DIR__ . '/../db/class.user.php');
    $user = User::getUserWithPassword($db, $_POST['email'], $_POST['password']);

    if ($user) {
        $session->setId($user->id);
        $session->setName($user->name());
        $session->addMessage('success', 'Login successful!');
        header('Location: ' . '../pages/index.php');
      } else {
        $session->addMessage('error', 'Wrong password!');
        echo "wrong password or username";
      }
?>
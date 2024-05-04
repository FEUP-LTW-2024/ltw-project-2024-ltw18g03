<?php
    declare(strict_types = 1);
    require_once(__DIR__ . '/../php/session.php');
    $session = new Session();

    require_once(__DIR__ . '/../db/connection.db.php');
    if ($session->isLoggedIn()) {
        header("Location: ../pages/sell.php");
    }
    else header("Location: ../pages/login.php");
?>


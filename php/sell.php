<?php
    declare(strict_types = 1);
    require_once(__DIR__ . '/../php/session.php');
    $session = new Session();

    require_once(__DIR__ . '/../db/connection.db.php');
    if ($session->isLoggedIn()) {
        $album_id = $_GET['id'] ?? null;

        // Redirect to sell.php with the album id as a URL parameter
        header("Location: ../pages/sell.php?id=" . $album_id);
    }
    else header("Location: ../pages/login.php");
?>


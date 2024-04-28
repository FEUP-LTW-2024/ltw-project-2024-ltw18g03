<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../php/session.php');
  $session = new Session();
  $session->logout();

  header('Location: ' . '../index.php');
?>
<?php
  declare(strict_types = 1);

  function getDBConn() {
    $db = new PDO('sqlite:' . __DIR__ . '/../db/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
  }
?>
<?php

include 'constants.php';
include BASE_PATH . 'bootstrap/config.php';
include BASE_PATH . 'vendor/autoload.php';
include BASE_PATH . 'libs/helpers.php';

try {
    $pdo = new PDO("mysql:dbname={$databaseConfig->db};host={$databaseConfig->host}", $databaseConfig->user, $databaseConfig->password);
} catch (PDOException $e) {
    diepage('Connection failed: ' . $e->getMessage());
}

include BASE_PATH . 'libs/lib-auth.php';
include BASE_PATH . 'libs/lib-tasks.php';

// echo "Connection is OK";
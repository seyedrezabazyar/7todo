<?php

include 'constants.php';
include 'config.php';
include 'vendor/autoload.php';
include 'libs/helpers.php';

try {
    $pdo = new PDO("mysql:dbname={$databaseConfig->db};host={$databaseConfig->host}", $databaseConfig->user, $databaseConfig->password);
} catch (PDOException $e) {
    diepage('Connection failed: ' . $e->getMessage());
}

include 'libs/lib-auth.php';
include 'libs/lib-tasks.php';

// echo "Connection is OK";
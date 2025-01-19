<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\config\ConnectionDB;

$connection = new ConnectionDB();

try {
    $connection->pdo->EXEC('
        CREATE TABLE courses (
            id SERIAL PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            description TEXT,
            image TEXT
        );
    ');
    echo "Migration executed with sucess";
} catch (\Throwable $th) {
    var_dump($th);
    echo "Migration erro - ".$th->getMessage();
}


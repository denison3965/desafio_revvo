<?php

namespace App\config;

use PDO;

class ConnectionDB {

    private string $host = 'postgres-db';
    private string $port = '5432';
    private string $dbname = 'main';
    private string $user = 'user';
    private string $password = 'pass';

    public PDO $pdo;

    public function __construct() {
        $dns_pdo = "pgsql:host=$this->host;port=$this->port;dbname=$this->dbname";
        $pdo = new PDO($dns_pdo,  $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
    }
}
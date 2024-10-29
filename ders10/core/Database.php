<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private $connection;

    public function __construct(array $db)
    {
        $this->connection = $this->getConnection($db);
    }

    private function getConnection(array $db): ?PDO
    {
        try {
            $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", $db['host'], $db['database']);
            $pdo = new PDO($dsn, $db['username'], $db['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }

    public function getConnectionInstance(): ?PDO
    {
        return $this->connection;
    }
}
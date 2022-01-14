<?php

declare(strict_types=1);

namespace App\Model;

use PDO;

abstract class AbstractModel
{
    protected PDO $conn;

    public function __construct(array $config)
    {
//            $this->validateConfig($config);
            $this->createConnection($config);
    }

    private function createConnection(array $config): void
    {
        $dsn = "mysql:dbname={$config['database']};host={$config['host']}";
        $this->conn = new PDO(
            $dsn,
            $config['user'],
            $config['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }

//    private function validateConfig(array $config): void
//    {
//        if (
//            empty($config['database'])
//            || empty($config['host'])
//            || empty($config['user'])
//            || empty($config['password'])
//        ) {
//            throw new ConfigurationException('Storage configuration error');
//        }
//    }
}

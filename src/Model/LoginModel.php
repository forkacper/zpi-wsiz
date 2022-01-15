<?php

namespace App\Model;

use PDO;

class LoginModel extends AbstractModel implements LoginInterface
{
    public function getUser(string $username, string $password): array
    {
        try {
            $username = $this->conn->quote($username);
            $password = $this->conn->quote($password);

            $password = md5($password);

            $query = "
            SELECT *
            FROM users
            WHERE username = $username 
                AND password = '$password'
        ";

            $result = $this->conn->query($query);

            $fetch = $result->fetchAll(PDO::FETCH_ASSOC);

            return count($fetch) === 1 ? $fetch : [];

        } catch (\PDOException $e) {
            throw new \PDOException($e);
        }

    }
}
<?php declare(strict_types=1);

namespace App\Model;

use PDO;

class LoadsModel extends AbstractModel implements LoadsInterface
{
    public function createLoad(string $name, int $userId): bool {
        try {
            $name = $this->conn->quote($name);

            $query = "
                INSERT INTO loads (name, user_id)
                VALUES ($name, $userId);
            ";

            $this->conn->query($query);

            return true;
        } catch (\PDOException $e) {
            throw new \PDOException($e);
        }
    }

    public function getLoads(int $userId): array
    {
        $query = "
            SELECT id, name 
            FROM loads 
            WHERE user_id = $userId; 
        ";

        $result = $this->conn->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function deleteLoad(int $loadId): bool
    {
        $query = "
            DELETE FROM loads
            WHERE id = $loadId;
        ";
        $this->conn->query($query);

        return true;
    }
}
<?php declare(strict_types=1);

namespace App\Model;

use PDO;

class RoutesModel extends AbstractModel implements RoutesInterface
{

    public function createRoute(string $name, int $userId): bool
    {
        // TODO: Implement createRoute() method.
    }

    public function getRoutes(int $userId): array
    {
        $query = "
            SELECT * FROM routes
            WHERE user_id = $userId;
        ";

        $result = $this->conn->query($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteRoute(int $loadId): bool
    {
        // TODO: Implement deleteRoute() method.
    }
}
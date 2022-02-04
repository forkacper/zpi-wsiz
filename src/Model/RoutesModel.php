<?php declare(strict_types=1);

namespace App\Model;

use PDO;

class RoutesModel extends AbstractModel implements RoutesInterface
{

    public function createRoute(array $params, int $userId): bool
    {
        $country = $this->conn->quote($params['country']);
        $city = $this->conn->quote($params['city']);
        $postcode = $this->conn->quote($params['postcode']);
        $street = $this->conn->quote($params['street']);
        $number = $this->conn->quote($params['number']);

        $query = "
            INSERT INTO routes (country, city, postcode, street, number, user_id)
            VALUES ($country, $city, $postcode, $street, $number, $userId);
        ";

        $this->conn->query($query);

        return true;
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
        $query = "
            DELETE FROM routes
            WHERE id = $loadId;
        ";
        $this->conn->query($query);

        return true;
    }
}
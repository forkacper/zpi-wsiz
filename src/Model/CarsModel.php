<?php

namespace App\Model;

class CarsModel extends AbstractModel implements CarsInterface
{

    public function getCars(): array
    {
        $sql = "SELECT * FROM cars";
        return $this->conn->query($sql)->fetchAll();
    }

    public function getCarById(int $id): array
    {
        // TODO: Implement getCarById() method.
    }

    public function addCar(array $params): bool
    {
        $plate = $this->conn->quote($params['plate']);
        $model = $this->conn->quote($params['model']);
        $brand = $this->conn->quote($params['brand']);

        $sql = "
            INSERT INTO cars (`plate`, `model`, `brand`, `is_used`, `is_free`)
            VALUES ($plate, $model, $brand, 0, 1)
        ";
        $this->conn->query($sql);

        return true;
    }

    public function editCar(array $params): bool
    {
        // TODO: Implement editCar() method.
    }

    public function deleteCar(int $id): bool
    {
        $sql[] = "UPDATE users SET `cars_id` = null WHERE `cars_id` = $id ";
        $sql[] = "DELETE FROM cars WHERE id = $id";

        foreach ($sql as $item) {
            $this->conn->query($item);
        }

        return true;
    }
}
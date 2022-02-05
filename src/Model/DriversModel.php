<?php

namespace App\Model;

class DriversModel extends AbstractModel implements DriversInterface
{
    public function getDrivers(): array
    {
        $sql = "
            SELECT users.id as id, users.firstname as firstname, users.lastname as lastname, cars.plate as registery, cars.brand as brand, cars.model as model FROM users
            INNER JOIN users_role on users.id_role = users_role.id
            INNER JOIN cars on users.cars_id = cars.id
            WHERE users_role.name = 'kierowca';
        ";

        return $this->conn->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function getDriverById(int $id): array
    {
        $carId = "SELECT cars_id FROM users WHERE id = $id";
        $carId = (int)$this->conn->query($carId)->fetchColumn();

        if($carId) {
            $sql[''] = "
                SELECT users.firstname as firstname, users.lastname as lastname, cars.id as car_id, cars.plate as plate, cars.model as model, cars.brand as brand FROM users 
                INNER JOIN cars on users.cars_id = cars.id
                WHERE users.id = $id;
            ";
            $sql[] = "SELECT * FROM cars WHERE cars.is_free = 1 AND id <> $carId";
        } else {
            $sql[] = "
                SELECT * FROM users
                WHERE user.id = $id;
            ";
            $sql[] = "SELECT * FROM cars WHERE cars.is_free = 1";
        }

        foreach ($sql as $item) {
            $drivers[] = $this->conn->query($item)->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $drivers;
    }

    public function createDriver(array $params): bool
    {
        $login = $this->conn->quote($params['login']);
        $password = $this->conn->quote($params['password']);
        $lastname = $this->conn->quote($params['lastname']);
        $firstname = $this->conn->quote($params['firstname']);
        $car = (int)$params['car'];

        $sql[] = "INSERT INTO users (`username`, `password`, `id_role`, `lastname`, `firstname`, `cars_id`)
                  VALUES ($login, $password, 3, $lastname, $firstname, $car);
                ";
        $sql[] = "UPDATE cars SET `is_free` = 0 WHERE id = $car";

        foreach ($sql as $item) {
            $this->conn->query($item);
        }

        return bool;
    }

    public function updateDriver(array $params): bool
    {
        $userCar = "SELECT cars_id FROM users WHERE id = " . $params['userId'];
        $userCar = (int)$this->conn->query($userCar)->fetchColumn();

        if ($userCar) {
            $sql[] = "UPDATE cars SET `is_used` = 0, `is_free` = 1 WHERE id = $userCar";
        }
        $sql[] = "UPDATE users SET `cars_id` = " . $params['newCar'];
        $sql[] = "UPDATE cars SET `is_used` = 0, `is_free` = 0 WHERE id = " . $params['newCar'];

        foreach ($sql as $item) {
            $this->conn->query($item);
        }

        return true;
    }

    public function deleteDriver(int $id): bool
    {
        $userCar = "SELECT cars_id FROM users WHERE id = $id";
        $userCar = (int)$this->conn->query($userCar)->fetchColumn();

        if($userCar) {
            $sql[] = "UPDATE cars SET `is_used` = 0, `is_free` = 1 WHERE id = $userCar";
        }
        $sql[] = "DELETE FROM users where id = $id;";

        foreach ($sql as $item) {
            $this->conn->query($item);
        }
        return true;
    }

    public function getCars(): array
    {
        $sql = "SELECT * FROM cars WHERE `is_free` = 1";
        return $this->conn->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }
}
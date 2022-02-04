<?php declare(strict_types=1);

namespace App\Model;

use PDO;

class OrdersModel extends AbstractModel implements OrdersInterface
{

    public function getDataForNewOrder(int $userId): array
    {
        $sql = "
            SELECT * FROM loads where user_id = $userId;
        ";

        $result['loads'] = $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $sql = "
            SELECT * FROM routes where user_id = $userId;
        ";

        $result['routes'] = $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function createOrder(array $orderParams, int $userId): bool
    {
        $number = $this->conn->quote($orderParams['number']);
        $dateStart = $this->conn->quote($orderParams['date_start']);
        $dateEnd = $this->conn->quote($orderParams['date_end']);
        $place = (int)$orderParams['place'];
        $unloading = (int)$orderParams['unloading'];
        $load = (int)$orderParams['load'];

        $sql = "
            INSERT INTO orders(`number`, `date_start`, `date_end`, `place`, `unloading`, `load`, `user_id`, `status`) 
            VALUES($number, $dateStart, $dateEnd, $place, $unloading, $load, $userId, 1);
        ";

        $this->conn->query($sql);

        return true;
    }

    public function getPendingOrders(string $userRole, int $userId): array
    {
        if($userRole === 'kontrahent') {
            $sql = "
                SELECT 
                orders.id as order_id, orders.number as order_number, orders.date_start , orders.date_end, orders.user_id as order_user_id,
                loads.name as loads_name,
                place.country as place_country, place.city as place_city, place.postcode as place_postcode, place.street as place_street, place.number as place_number,
                unloading.country as unloading_country, unloading.city as unloading_city, unloading.postcode as unloading_postcode, unloading.street as unloading_street, unloading.number as unloading_number
                FROM orders
                INNER JOIN loads on orders.load = loads.id
                INNER JOIN routes as place on orders.place = place.id
                INNER JOIN routes as unloading on orders.unloading = unloading.id
                INNER JOIN orders_status on orders.status = orders_status.id
                WHERE orders_status.name = 'Nowe' AND orders.user_id = $userId;
            ";
        }

        if($userRole === 'spedytor') {
            $sql = "
                SELECT 
                orders.id as order_id, orders.number as order_number, orders.date_start , orders.date_end, orders.user_id as order_user_id,
                loads.name as loads_name,
                place.country as place_country, place.city as place_city, place.postcode as place_postcode, place.street as place_street, place.number as place_number,
                unloading.country as unloading_country, unloading.city as unloading_city, unloading.postcode as unloading_postcode, unloading.street as unloading_street, unloading.number as unloading_number
                FROM orders
                INNER JOIN loads on orders.load = loads.id
                INNER JOIN routes as place on orders.place = place.id
                INNER JOIN routes as unloading on orders.unloading = unloading.id
                INNER JOIN orders_status on orders.status = orders_status.id
                WHERE orders_status.name = 'Nowe';
            ";
        }

        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getInProgressOrders(string $userRole, int $userId): array
    {
        if($userRole === 'kontrahent') {
            $sql = "
                SELECT 
                orders.id as order_id, orders.number as order_number, orders.date_start , orders.date_end, orders.user_id as order_user_id,
                loads.name as loads_name,
                place.country as place_country, place.city as place_city, place.postcode as place_postcode, place.street as place_street, place.number as place_number,
                unloading.country as unloading_country, unloading.city as unloading_city, unloading.postcode as unloading_postcode, unloading.street as unloading_street, unloading.number as unloading_number,
                users.firstname as driver_first_name, users.lastname as driver_last_name,
                cars.plate as car_plate, cars.brand as car_brand, cars.model as car_model
                FROM orders
                INNER JOIN loads on orders.load = loads.id
                INNER JOIN routes as place on orders.place = place.id
                INNER JOIN routes as unloading on orders.unloading = unloading.id
                INNER JOIN orders_status on orders.status = orders_status.id
                INNER JOIN users on orders.driver_id = users.id
                INNER JOIN cars on users.cars_id = cars.id
                WHERE orders_status.name = 'W realizacji' AND orders.user_id = $userId;
            ";
        }

        if($userRole === 'spedytor') {
            $sql = "
                SELECT 
                orders.id as order_id, orders.number as order_number, orders.date_start , orders.date_end, orders.user_id as order_user_id,
                loads.name as loads_name,
                place.country as place_country, place.city as place_city, place.postcode as place_postcode, place.street as place_street, place.number as place_number,
                unloading.country as unloading_country, unloading.city as unloading_city, unloading.postcode as unloading_postcode, unloading.street as unloading_street, unloading.number as unloading_number,
                users.firstname as driver_first_name, users.lastname as driver_last_name,
                cars.plate as car_plate, cars.brand as car_brand, cars.model as car_model
                FROM orders
                INNER JOIN loads on orders.load = loads.id
                INNER JOIN routes as place on orders.place = place.id
                INNER JOIN routes as unloading on orders.unloading = unloading.id
                INNER JOIN orders_status on orders.status = orders_status.id
                INNER JOIN users on orders.driver_id = users.id
                INNER JOIN cars on users.cars_id = cars.id
                WHERE orders_status.name = 'W realizacji';
            ";
        }

        if($userRole === 'kierowca') {
            $sql = "
                SELECT 
                orders.id as order_id, orders.number as order_number, orders.date_start , orders.date_end, orders.user_id as order_user_id,
                loads.name as loads_name,
                place.country as place_country, place.city as place_city, place.postcode as place_postcode, place.street as place_street, place.number as place_number,
                unloading.country as unloading_country, unloading.city as unloading_city, unloading.postcode as unloading_postcode, unloading.street as unloading_street, unloading.number as unloading_number,
                users.firstname as driver_first_name, users.lastname as driver_last_name,
                cars.plate as car_plate, cars.brand as car_brand, cars.model as car_model
                FROM orders
                INNER JOIN loads on orders.load = loads.id
                INNER JOIN routes as place on orders.place = place.id
                INNER JOIN routes as unloading on orders.unloading = unloading.id
                INNER JOIN orders_status on orders.status = orders_status.id
                INNER JOIN users on orders.driver_id = users.id
                INNER JOIN cars on users.cars_id = cars.id
                WHERE orders_status.name = 'W realizacji' AND orders.driver_id = $userId;
            ";
        }

        return $result = $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCompletedOrders(string $userRole, int $userId): array
    {
        if($userRole === 'kontrahent') {
            $sql = "
                SELECT 
                orders.id as order_id, orders.number as order_number, orders.date_start , orders.date_end, orders.user_id as order_user_id,
                loads.name as loads_name,
                place.country as place_country, place.city as place_city, place.postcode as place_postcode, place.street as place_street, place.number as place_number,
                unloading.country as unloading_country, unloading.city as unloading_city, unloading.postcode as unloading_postcode, unloading.street as unloading_street, unloading.number as unloading_number,
                users.firstname as driver_first_name, users.lastname as driver_last_name,
                cars.plate as car_plate, cars.brand as car_brand, cars.model as car_model
                FROM orders
                INNER JOIN loads on orders.load = loads.id
                INNER JOIN routes as place on orders.place = place.id
                INNER JOIN routes as unloading on orders.unloading = unloading.id
                INNER JOIN orders_status on orders.status = orders_status.id
                INNER JOIN users on orders.driver_id = users.id
                INNER JOIN cars on users.cars_id = cars.id
                WHERE orders_status.name = 'Zakończone' AND orders.user_id = $userId;
            ";
        }

        if($userRole === 'spedytor') {
            $sql = "
                SELECT 
                orders.id as order_id, orders.number as order_number, orders.date_start , orders.date_end, orders.user_id as order_user_id,
                loads.name as loads_name,
                place.country as place_country, place.city as place_city, place.postcode as place_postcode, place.street as place_street, place.number as place_number,
                unloading.country as unloading_country, unloading.city as unloading_city, unloading.postcode as unloading_postcode, unloading.street as unloading_street, unloading.number as unloading_number,
                users.firstname as driver_first_name, users.lastname as driver_last_name,
                cars.plate as car_plate, cars.brand as car_brand, cars.model as car_model
                FROM orders
                INNER JOIN loads on orders.load = loads.id
                INNER JOIN routes as place on orders.place = place.id
                INNER JOIN routes as unloading on orders.unloading = unloading.id
                INNER JOIN orders_status on orders.status = orders_status.id
                INNER JOIN users on orders.driver_id = users.id
                INNER JOIN cars on users.cars_id = cars.id
                WHERE orders_status.name = 'Zakończone';
            ";
        }

        if($userRole === 'kierowca') {
            $sql = "
                SELECT 
                orders.id as order_id, orders.number as order_number, orders.date_start , orders.date_end, orders.user_id as order_user_id,
                loads.name as loads_name,
                place.country as place_country, place.city as place_city, place.postcode as place_postcode, place.street as place_street, place.number as place_number,
                unloading.country as unloading_country, unloading.city as unloading_city, unloading.postcode as unloading_postcode, unloading.street as unloading_street, unloading.number as unloading_number,
                users.firstname as driver_first_name, users.lastname as driver_last_name,
                cars.plate as car_plate, cars.brand as car_brand, cars.model as car_model
                FROM orders
                INNER JOIN loads on orders.load = loads.id
                INNER JOIN routes as place on orders.place = place.id
                INNER JOIN routes as unloading on orders.unloading = unloading.id
                INNER JOIN orders_status on orders.status = orders_status.id
                INNER JOIN users on orders.driver_id = users.id
                INNER JOIN cars on users.cars_id = cars.id
                WHERE orders_status.name = 'Zakończone' AND orders.driver_id = $userId;
            ";
        }

        return $result = $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderById(int $orderId): array
    {

        $sql = "
            SELECT 
            orders.id as order_id, orders.number as order_number, orders.date_start , orders.date_end, orders.user_id as order_user_id,
            loads.name as loads_name,
            place.country as place_country, place.city as place_city, place.postcode as place_postcode, place.street as place_street, place.number as place_number,
            unloading.country as unloading_country, unloading.city as unloading_city, unloading.postcode as unloading_postcode, unloading.street as unloading_street, unloading.number as unloading_number,
            users.firstname as driver_first_name, users.lastname as driver_last_name,
            cars.plate as car_plate, cars.brand as car_brand, cars.model as car_model
            FROM orders
            INNER JOIN loads on orders.load = loads.id
            INNER JOIN routes as place on orders.place = place.id
            INNER JOIN routes as unloading on orders.unloading = unloading.id
            INNER JOIN orders_status on orders.status = orders_status.id
            INNER JOIN users on orders.driver_id = users.id
            INNER JOIN cars on users.cars_id = cars.id
            WHERE orders.id = $orderId;
        ";

        $result = count($this->conn->query($sql)->fetchAll());

        if(!$result) {
            $sql = "
                SELECT 
                orders.id as order_id, orders.number as order_number, orders.date_start , orders.date_end, orders.user_id as order_user_id,
                loads.name as loads_name,
                place.country as place_country, place.city as place_city, place.postcode as place_postcode, place.street as place_street, place.number as place_number,
                unloading.country as unloading_country, unloading.city as unloading_city, unloading.postcode as unloading_postcode, unloading.street as unloading_street, unloading.number as unloading_number
                FROM orders
                INNER JOIN loads on orders.load = loads.id
                INNER JOIN routes as place on orders.place = place.id
                INNER JOIN routes as unloading on orders.unloading = unloading.id
                INNER JOIN orders_status on orders.status = orders_status.id
                WHERE orders.id = $orderId;
            ";
        }

        return $this->conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function editOrder(array $orderParams): array
    {
        // TODO: Implement editOrder() method.
    }

    public function deleteOrder(int $orderId): bool
    {
        $sql = "
        DELETE FROM orders WHERE id = $orderId;
        ";

        $this->conn->query($sql);

        return true;
    }

    public function getDriversToOrder(): array
    {
        $sql = "
            SELECT * FROM users
            INNER JOIN users_role on users.id_role = users_role.id
            INNER JOIN cars on users.cars_id = cars.id
            WHERE cars.is_used = 0;
        ";

        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStatusesToOrder(int $orderId): array
    {
        $sql = "
            SELECT orders_status.id as id, orders_status.name as name from orders
            INNER JOIN orders_status on orders.status = orders_status.id;
        ";

        $result['aktualny'] = $this->conn->query($sql)->fetch(PDO::FETCH_ASSOC);

        $sql = "
            SELECT * from orders_status
            WHERE id <> " . $result['aktualny']['id'];

        $result['dostepne'] = $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
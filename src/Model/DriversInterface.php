<?php

namespace App\Model;

interface DriversInterface
{
    public function getDrivers(): array;
    public function getDriverById(int $id): array;
    public function getCars(): array;
    public function createDriver(array $params): bool;
    public function updateDriver(array $params): bool;
    public function deleteDriver(int $id): bool;
}
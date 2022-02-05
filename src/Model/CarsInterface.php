<?php

namespace App\Model;

interface CarsInterface
{
    public function getCars(): array;
    public function getCarById(int $id): array;
    public function addCar(array $params): bool;
    public function editCar(array $params): bool;
    public function deleteCar(int $id): bool;
}
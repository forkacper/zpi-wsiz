<?php declare(strict_types=1);

namespace App\Model;

interface RoutesInterface
{
    public function createRoute(array $params, int $userId): bool;
    public function getRoutes(int $userId): array;
    public function deleteRoute(int $loadId): bool;
}
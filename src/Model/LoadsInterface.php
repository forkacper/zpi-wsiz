<?php declare(strict_types=1);

namespace App\Model;

interface LoadsInterface
{
    public function createLoad(string $name, int $userId): bool;
    public function getLoads(int $userId): array;
    public function deleteLoad(int $loadId): bool;
}
<?php declare(strict_types=1);

namespace App\Model;

interface OrdersInterface
{
    public function getDataForNewOrder(int $userId): array;
    public function createOrder(array $orderParams, int $userId): bool;
    public function getPendingOrders(string $userRole, int $userId): array;
    public function getInProgressOrders(string $userRole, int $userId): array;
    public function getCompletedOrders(string $userRole, int $userId): array;
    public function getOrderById(int $orderId): array;
    public function editOrder(int $orderId, int $userId, int $statusId): bool;
    public function getDriversToOrder(): array;
    public function getStatusesToOrder(int $orderId): array;
    public function deleteOrder(int $orderId): bool;
}
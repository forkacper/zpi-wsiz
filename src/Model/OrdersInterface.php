<?php declare(strict_types=1);

namespace App\Model;

interface OrdersInterface
{
    public function getDataForNewOrder(int $userId): array;
    public function createOrder(array $orderParams, int $userId): bool;
    public function getPendingOrders(): array;
    public function getInProgressOrders(): array;
    public function getCompletedOrders(): array;
    public function getOrderById(int $orderId): array;
    public function editOrder(array $orderParams): array;
    public function deleteOrder(int $orderId): bool;
}
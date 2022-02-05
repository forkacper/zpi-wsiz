<?php

namespace App\Model;

interface ContractorsInterface
{
    public function getContractors(): array;
    public function addContractor(array $params): bool;
    public function deleteContractor(int $id): bool;
}
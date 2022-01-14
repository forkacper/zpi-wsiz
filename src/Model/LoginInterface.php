<?php

declare(strict_types=1);

namespace App\Model;

interface LoginInterface
{
    public function get(string $username, string $password): bool;
}
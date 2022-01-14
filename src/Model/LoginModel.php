<?php

namespace App\Model;

use PDO;

class LoginModel extends AbstractModel implements LoginInterface
{
    public function get(string $username, string $password): bool
    {
        // TODO: Implement get() method.
    }
}
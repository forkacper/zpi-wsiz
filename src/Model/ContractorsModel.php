<?php

namespace App\Model;

class ContractorsModel extends AbstractModel implements ContractorsInterface
{

    public function getContractors(): array
    {
        $sql = "SELECT * FROM users WHERE `id_role` = 4";
        return $this->conn->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addContractor(array $params): bool
    {
        $password = md5($params['password']);

        $firstname = $this->conn->quote($params['firstname']);
        $lastname = $this->conn->quote($params['lastname']);
        $login = $this->conn->quote($params['login']);
        $password = $this->conn->quote($password);

        $sql = "INSERT INTO users (`username`, `password`, `firstname`, `lastname`, `id_role`)
            VALUES ($login, $password, $firstname, $lastname, 4)
        ";

        $this->conn->query($sql);

        return true;
    }

    public function deleteContractor(int $id): bool
    {
        $sql = "DELETE FROM users WHERE id = $id";

        $this->conn->query($sql);

        return true;
    }
}
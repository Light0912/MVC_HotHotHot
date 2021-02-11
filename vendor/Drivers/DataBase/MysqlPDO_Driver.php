<?php

namespace vendor\Drivers\DataBase;

use PDO;
use vendor\System\Exception\DataBaseException;

class MysqlPDO_Driver implements DataBaseInterface
{

    private PDO $connection;

    public function __construct($config)
    {
        try {
            $this->connection =
                new PDO("mysql:host=$config[hostname];dbname=$config[database]",$config['username'],$config['password'],
                    [PDO::ATTR_ERRMODE => 2, PDO::FETCH_ASSOC => 1]);
        } catch (\Exception $e) {
            throw new DataBaseException($e->getMessage());
        }

    }

    public function testConnection(): bool
    {
        return count($this->connection->query('SELECT VERSION()')->fetchAll()) > 0;
    }

    public function insert($relationKey, $data): int
    {
        $query = "INSERT INTO $relationKey (" . implode(',', array_keys($data)) . ")";
        $query .= " VALUES ('" . implode("','", array_values($data)) . "')";
        $this->connection->query($query);
        return (int)$this->connection->lastInsertId();
    }

    public function get(string $relationKey, array $where): array|bool
    {
        $query = "SELECT * FROM $relationKey WHERE ";
        foreach ($where as $key => $val) {
            $query .= $key . ' = "' . $val . '", ';
        }

        $query = substr($query, 0, strlen($query) - 2);
        $query .= ' LIMIT 1';

        $result = $this->connection->query($query)->fetchAll();
        return (count($result) > 0) ? $result[0] : false;
    }

    public function getAll(string $relationKey, array $where): array|bool
    {
        $query = "SELECT * FROM $relationKey WHERE ";
        foreach ($where as $key => $val) {
            $query .= $key . ' = "' . $val . '", ';
        }
        $query = substr($query, 0, strlen($query) - 2);

        return $this->connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function count(string $relationKey, array $where): int
    {
        $query = "SELECT * id FROM $relationKey WHERE ";
        foreach ($where as $key => $val) {
            $query .= $key . ' = "' . $val . '", ';
        }
        $query = substr($query, 0, strlen($query) - 2);
        return count($this->connection->query($query)->fetchAll());
    }

    public function delete(string $relationKey, int $id)
    {
        $query = "DELETE $relationKey WHERE id = $id";
        $this->connection->query($query);
    }

    public function edit(string $relationKey, int $id, array $data)
    {
        $query = "UPDATE $relationKey SET ";
        foreach ($data as $key => $val) {
            $query .= $key . ' = "' . $val . '", ';
        }
        $query = substr($query, 0, strlen($query) - 2);
        $query .= "WHERE id = $id";

        $this->connection->query($query);

    }
}
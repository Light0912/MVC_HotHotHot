<?php

namespace vendor\Drivers\DataBase;

use MongoClient;
use MongoDB;

class MongoDB_Driver implements DataBaseInterface
{

    private MongoClient $client;
    private MongoDB $connection;

    public function __construct($config)
    {
        $this->client = new MongoClient("mongodb://$config[hostname]:$config[port]");
        $this->connection = $this->client->selectDB($config['database']);
        $this->connection->authenticate($config['username'], $config['password']);
    }

    public function testConnection(): bool
    {
        return $this->client->connect();
    }

    public function insert($relationKey, $data) : int
    {
        $collection = $this->connection->{$relationKey};
        $collection->insert($data);
        return $data['_id'];
    }

    public function get(string $relationKey, array $where): array|bool
    {
        $collection = $this->connection->{$relationKey};
        $result = $collection->findOne($where);
        if (count($result) > 0) {
            $result['id'] = new MongoId($result['_id']);
            return $result;
        }
        return false;
    }

    public function getAll(string $relationKey, array $where): array|bool
    {
        die('pas implenté');
    }

    public function count(string $relationKey, array $where) : int
    {
        $collection = $this->connection->{$relationKey};
        return $collection->count($where);
    }

    public function delete(string $relationKey, int $id)
    {
        $collection = $this->connection->{$relationKey};
        $collection->remove(['_id' => $id]);
    }

    public function edit(string $relationKey, int $id, array $data)
    {
        $collection = $this->connection->{$relationKey};
        $collection->findAndModify(['_id' => $id], $data);
    }
}
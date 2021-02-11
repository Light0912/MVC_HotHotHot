<?php

namespace vendor\Drivers\DataBase;

interface DataBaseInterface {

    public function __construct($config);
    public function testConnection() : bool;

    public function insert(string $relationKey, array $data) : int;
    public function get(string $relationKey, array $where) : array|bool;
    public function getAll(string $relationKey, array $where) : array|bool;
    public function count(string $relationKey, array $where) : int;
    public function delete(string $relationKey, int $id);
    public function edit(string $relationKey, int $id, array $data);

}
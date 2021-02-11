<?php


namespace Model;


use PDO;
use vendor\System\System;
use vendor\System\SystemException;


class Model extends System
{

    protected array $attribute = [];
    private static string $tableName;
    private static int $id;
    private static string $where;

    protected static function getData($tableName, $where): bool|array
    {
        $db = self::getDatabase();
        self::$tableName = $tableName;

        try {
            $data = $db->query("SELECT * FROM " . $tableName . ' WHERE ' . $where . ' LIMIT 1')->fetch(PDO::FETCH_ASSOC);
            if (!$data) {
                http_response_code(404);
                exit();
            }
        } catch (\Exception $e) {
            $data = false;
        }
        self::$id = $data['id'];
        return $data;
    }

    public function getAllData($tableName, $where = "true"): bool|array
    {
        $db = self::getDatabase();
        return $db->query("SELECT * FROM $tableName WHERE $where")->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function updateLocalData(): void
    {
        $d = self::getData(self::$tableName, self::$where);
        foreach (array_keys($this->attribute) as $key) {
            $this->attribute[$key] = $d[$key];
        }
    }

    public function create(): bool|string
    {
        $columns = '';
        $values = '';
        $query = 'INSERT INTO ' . self::$tableName;

        foreach ($this->attribute as $key => $val) {
            $columns .= $key . ', ';
            $values .= '"' . $val . '", ';
        }
        $columns = substr($columns, strlen($columns) - 2);
        $values = substr($values, strlen($values) - 2);

        $query .= '(' . $columns . ') VALUES (' . $values . ')';

        try {
            $this->getDatabase()->query($query);
            $id = $this->getDatabase()->lastInsertId(self::$tableName);
            $this->attribute['id'] = $id;
        } catch (\Exception $e) {
            $id = false;
        }
        return $id;
    }

    public function update(): void
    {
        $id = self::$id;
        $query = 'UPDATE ' . self::$tableName . ' SET ';
        foreach ($this->attribute as $key => $val) {
            $query .= $key . ' = "' . $val . '", ';
        }
        $query = substr($query, 0, strlen($query) - 2);
        $query .= "WHERE id = {$id}";
        $this->getDatabase()->query($query);
    }

    public function delete(): void
    {
        $id = self::$id;
        $query = 'DELETE FROM ' . self::$tableName;
        $query .= " WHERE id = {$id}";
        var_dump($query);
        $this->getDatabase()->query($query);
    }

}
<?php


namespace Model;


use vendor\System\System;


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
            $data = $db->query("SELECT * FROM " . $tableName . ' WHERE ' . $where . ' LIMIT 1')->fetchAll(MYSQLI_ASSOC)[0];
            self::$id = $data['id'];
        } catch (\Exception $e) {
            $data = false;
        }

        return $data;
    }

    protected function updateLocalData() : void {
        $d = self::getData(self::$tableName, self::$where);
        foreach (array_keys($this->attribute) as $key) {
            $this->attribute[$key] = $d[$key];
        }
    }

    public function create() : bool|string
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

    public function update() : void {

        $query = 'UPDATE ' . self::$tableName . 'SET ';
        foreach ($this->attribute as $key => $val) {
            $query .= $key . ' = "' . $val . '", ';
        }
        $query = substr($query, strlen($query) - 2);
        $query .= ' WHERE id = ' . self::$id;

        $this->getDatabase()->query($query);

    }

}
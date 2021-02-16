<?php


namespace Model;


use vendor\System\System;


class Model extends System
{

    protected array $attribute = [];
    private static ?string $tableName = null;
    private static int $id;
    private static string $where;

    protected static function getData($tableName, array $where): bool|array
    {
        self::$tableName = $tableName;

        $data = System::$db->get(self::$tableName, $where);

        self::$id = $data['id'];
        return $data;
    }

    public function getAllData(string $tableName, array $where = [1 => 1]): bool|array
    {
        return System::$db->getAll($tableName, $where);
    }

    protected function updateLocalData(): void
    {
        $d = self::getData(self::$tableName, self::$where);
        foreach (array_keys($this->attribute) as $key) {
            $this->attribute[$key] = $d[$key];
        }
    }

    public function export(): array
    {
        return $this->attribute;
    }

    public function create($tableName): void
    {
        System::$db->insert($tableName, $this->attribute);
    }

    public function update(): void
    {
        System::$db->edit(self::$tableName, self::$id, $this->attribute);
    }

    public function delete(): void
    {
        System::$db->delete(self::$tableName, self::$id);
    }

}
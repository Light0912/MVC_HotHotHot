<?php


namespace Model;

class Sensors extends Model
{

    private static string $tableName = 'Sensors';

    public static function get ($where): bool|Sensors
    {
        $data = self::getData(self::$tableName, $where);
        if ($data === false) return false;
        return new Sensors($data);
    }

    public function __construct(...$args)
    {
        foreach ($args as $key => $val) {
            $this->{'set' . ucfirst($key)}($val);
        }
    }

    private function setValue($v) {
        $this->attribute['value'] = $v;
    }

    private function setName($v) {
        $this->attribute['name'] = $v;
    }

    private function getId($v) {
        return $this->attribute['id'];
    }

    private function getValue($v) {
        return $this->attribute['value'];
    }

    private function getName($v) {
        return $this->attribute['name'];
    }

}
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

    public function setValue($v) {
        $this->attribute['value'] = $v;
    }

    public function setName($v) {
        $this->attribute['name'] = $v;
    }

    private function getId() {
        return $this->attribute['id'];
    }

    public function getValue() {
        return $this->attribute['value'];
    }

    public function getName() {
        return $this->attribute['name'];
    }

}
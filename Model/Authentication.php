<?php


namespace Model;


class Authentication extends Model
{
    private static string $tableName = 'user';

    public static function get($where): Authentication|bool
    {
        $data = self::getData(self::$tableName, $where);
        if ($data === false) return false;
        $data = new Authentication($data);
        return $data;
    }

    public function __construct(...$args)
    {
        if (isset($args[0])) $args = $args[0];
        foreach ($args as $key => $val) {
            $this->attribute[$key] = $val;
        }
    }

    public function setUsername($v)
    {
        $this->attribute['username'] = $v;
    }

    public function setPassword($v)
    {
        $this->attribute['password'] = $v;
    }

    public function setPrenom($v)
    {
        $this->attribute['prenom'] = $v;
    }

    public function setNom($v)
    {
        $this->attribute['nom'] = $v;
    }

    public function setMobile($v)
    {
        $this->attribute['mobile'] = $v;
    }

    public function getId()
    {
        return $this->attribute['id'];
    }

    public function getUsername(): string
    {
        return $this->attribute['username'];
    }

    public function getPassword(): string
    {
        return $this->attribute['password'];
    }

    public function getPrenom(): string|null
    {
        return $this->attribute['prenom'];
    }

    public function getNom(): string|null
    {
        return $this->attribute['nom'];
    }

    public function getMobile(): string|null
    {
        return $this->attribute['mobile'];
    }
}
<?php


namespace Model;


class Authentication extends Model
{
    private static string $tableName = 'user';
    private int $id;
    private string $prenom;
    private string $nom;
    private string $username;
    private string $mobile;
    private string $password;

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

    public function setId($v)
    {
        $this->id = $v;
    }

    public function setUsername($v)
    {
        $this->username = $v;
    }

    public function setPassword($v)
    {
        $this->password = $v;
    }

    public function setPrenom($v)
    {
        $this->prenom = $v;
    }

    public function setNom($v)
    {
        $this->nom = $v;
    }

    public function setMobile($v)
    {
        $this->mobile = $v;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getPrenom(): string|null
    {
        return $this->prenom;
    }

    public function getNom(): string|null
    {
        return $this->nom;
    }

    public function getMobile(): string|null
    {
        return $this->mobile;
    }
}
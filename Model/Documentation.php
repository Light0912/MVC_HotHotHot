<?php


namespace Model;


class Documentation extends Model
{
    private static string $tableName = 'docs';

    public static function get($where): Documentation|bool
    {
        $data = self::getData(self::$tableName, $where);
        if ($data === false) return false;
        $data = new Documentation($data);
        return $data;
    }

    public function __construct(...$args)
    {
        if (isset($args[0])) $args = $args[0];
        foreach ($args as $key => $val) {
            $this->attribute[$key] = $val;
        }
    }

    public function setTitle($v)
    {
        $this->attribute['title'] = $v;
    }

    public function setContent($v)
    {
        $this->attribute['content'] = $v;
    }

    public function setParentId($v)
    {
        $this->attribute['parent_id'] = $v;
    }

    public function setCacheUrl($v)
    {
        $this->attribute['cache_url'] = $v;
    }

    public function getId()
    {
        return $this->attribute['id'];
    }

    public function getTitle()
    {
        return $this->attribute['title'];
    }

    public function getContent()
    {
        return $this->attribute['content'];
    }

    public function getParentId(): int
    {
        return $this->attribute['parent_id'];
    }

    public function getCacheUrl(): string|null
    {
        return $this->attribute['cache_url'];
    }

}
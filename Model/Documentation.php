<?php


namespace Model;


class Documentation extends Model
{
    private static string $tableName = 'docs';

    public static function get($where): bool|array
    {
        $data = self::getData(self::$tableName, $where);
        if ($data === false) return false;
        return $data;
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

    private function getId()
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

}
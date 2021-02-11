<?php

namespace vendor\System;

use Model\Documentation;
use vendor\Drivers\DataBase\DataBaseInterface;
use \vendor\System\Router;
use \vendor\System\Exception\SystemException;

class System
{

    public static array $config;
    public static DataBaseInterface $db;

    public function __construct()
    {
        $this->loadConfig();
        $this->loadDataBase();
    }

    private function loadDataBase() {
            $db = new Database();
            self::$db = $db->useDatabase();
    }

    private function loadConfig () {
        $config_file_path = __DIR__ .'/../../config/config.ini';
        if (!file_exists($config_file_path)) {
            throw new SystemException("Impossible de trouver le fichier de configuration, chemin testé : $config_file_path");
        }
        try {
            self::$config = parse_ini_file($config_file_path,true);
        } catch (\Exception $e) {
            throw new SystemException("Impossible de parser le fichier de configuration");
        }
    }

    protected function render(string $filename, array $d = [], bool $isCore = true): bool|string
    {
        extract($d);
        $request = Router::getRequest();
        if ($request !== false) {
            ob_start();
            require '../Vues/' . $filename . '.php';
            $content = ob_get_clean();
            if ($isCore) {
                require '../Vues/core/core.php';
            }
        } else {
            require '../Vues/' . $filename . '.php';
        }
        return $content;
    }

    protected function redirect($url): void
    {
        header("Location: " . $url);
        exit();
    }

    protected static function getDatabase(): \DataBaseInterface {
        return self::$db;
    }

    protected function isCache($file): bool
    {
        $expire = time() - 3600;
        if (file_exists($file)) {
            if (filemtime($file) > $expire) {
                return true;
            } else {
                unlink($file);
                return false;
            }
        }
        return false;
    }

    private static function writeCache($content): bool|string
    {
        $cache_directory = "cache/";
        if(!is_dir($cache_directory)){
            mkdir($cache_directory);
        }
        $token = str_shuffle(hash("md5", "abcdefghabcdefghabcdefghabcdefgh"));
        ob_start();
        echo $content;
        $page = ob_get_contents();
        ob_end_clean();
        $cache_file = $cache_directory . $token . ".html";
        file_put_contents($cache_file, $page);
        return $cache_file;
    }

    protected function readCache($cache): void
    {
        $content = file_get_contents($cache);
        require '../Vues/core/core.php';
    }

    protected function onCache($content, $id)
    {
        $file = self::writeCache($content);
        $documentation = Documentation::get("id = " . $id);
        $documentation->setCacheUrl($file);
        $documentation->update();
    }

    protected function renderTree($tree, $key, $id): string
    {
        $markup = '';
        foreach ($tree as $branch => $twig) {
            if (is_array($twig)){
                 $markup .= '<li>' . "<a href=\"doc/{$twig[$id]}\">" . $twig[$key] . $this->renderTree($twig, $key, $id) . '</a></li>';
            }
        }
        return '<ul>' . $markup . '</ul>';
    }

}
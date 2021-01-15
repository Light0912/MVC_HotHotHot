<?php


namespace vendor\System;


use PDO;

class Database
{
private static PDO|null $pdo = null;
    public function useDatabase(): PDO
    {
        $debug = true;
        $database_config = parse_ini_file(
            "../config/config.ini",
            true);
        if (is_array($database_config)){
            if ($debug){
                $database_config = $database_config['development'];
            }else{
                $database_config = $database_config['production'];
            }
        }

        if (!self::$pdo) {
            self::$pdo = new PDO(
                'mysql:host='. $database_config['hostname'] .
                ';dbname=' . $database_config['database'],
                $database_config['username'],
                $database_config['password']
            , [PDO::ATTR_ERRMODE => 2]);
        }
        return self::$pdo;
    }
}
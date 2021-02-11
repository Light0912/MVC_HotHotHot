<?php


namespace vendor\System;


use vendor\Drivers\DataBase\DataBaseInterface;
use vendor\System\Exception\DataBaseException;
use vendor\System\Exception\SystemException;

class Database
{
    private array $config;

    public function __construct()
    {
        $this->loadConfig();
    }

    private function loadConfig () {
        $config_key = (System::$config['dev'] == 'true' || System::$config['dev'] == 1) ? 'DB-DEV' : 'DB-PROD';
        $this->config = System::$config[$config_key];
    }


    public function useDatabase(): DataBaseInterface
    {
        $driver = $this->config['DBDriver'];
        $class = "vendor\Drivers\DataBase\\$driver";
        if (class_exists($class, true)) {

            /** @var DataBaseInterface $driverClass */
            $driverClass = new $class($this->config);

            if ($driverClass->testConnection()) {
                return $driverClass;
            } else {
                throw new DataBaseException("Impossible d'etablir la connexion avec la base de données");
            }

        } else {
            throw new SystemException("Impossible de charger le driver : $driver ");
        }
    }
}
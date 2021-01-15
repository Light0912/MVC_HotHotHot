<?php

namespace vendor\System;

use \vendor\System\Router;

class System
{
    public function render(string $filename, array $d = [] , bool $isCore = true): void
    {
        extract($d);

        $request = Router::getRequest();
        if ($request !== false) {
            ob_start();
            require '../Vues/' . $filename . '.php';
            $content = ob_get_clean();
            if ($isCore){
                require '../Vues/core/core.php';
            }
        } else {
            require '../Vues/' . $filename . '.php';
        }
    }

    public function getDatabase(): \PDO
    {
        $pdo = new Database();

        return $pdo->useDatabase();
    }
}
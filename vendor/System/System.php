<?php

namespace vendor\System;

class System
{
    public function render(string $filename, array $d = []): void
    {
        extract($d);

        if (Router::getRoute()) {
            ob_start();
            require '../Vues/' . $filename . '.php';
            $content = ob_get_clean();
            require '../Vues/core/core.php';
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
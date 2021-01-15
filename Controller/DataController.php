<?php

use vendor\System\System;

class DataController extends System
{
    public function index(){
        if (isset($_POST['post'])){
            $query = $this->getDatabase()->prepare(
                'INSERT INTO test SET nom = ?, prenom = ?'
            );
            $query->execute([$_POST['nom'], $_POST['prenom']]);
        }
        $this->render("data");
    }
}
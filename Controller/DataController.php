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

    public function test() {

        /**
         * Recup d'un element
         */

        $sensor = \Model\Sensors::get('id = 1');
        if ($sensor !== false) {
            // J'ai un element en bd
            echo $sensor->getName();
        }

        /**
         * Craetion d'un element
         */

        $sensor = new \Model\Sensors();
        $sensor->setName("Ok");
        $sensor->setValue("fd");
        $id_en_bd = $sensor->create();
        if ($id_en_bd !== false) {
            // lA creation c'esy bien passé
            echo $id_en_bd;
        }

        /**
         * Modification d'un element en BD
         */

        $sensor = \Model\Sensors::get('id = 1');
        echo $sensor->getName(); // retourne blblbl
        $sensor->setName('fdf'); // Affectation de la nouvelle valeur
        $sensor->update(); // Mise a jour de toutes les valeurs en db

    }
}
<?php


use vendor\System\Request;
use vendor\System\System;

class CapteurController extends System
{

    public function index(){
        $this->render('capteur');
    }

}
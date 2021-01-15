<?php


use vendor\System\System;

class HomeController extends System
{
    public function index(){
        $this->render('home');
    }
}
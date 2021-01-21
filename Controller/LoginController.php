<?php


use vendor\System\System;

class LoginController extends System
{
    public function index()
    {
        $this->render("login");
    }
}
<?php

use Model\Authentication;
use vendor\System\System;

class AuthenticationController extends System
{
    public function _Register()
    {
        $authentication = new Authentication();

        $test = $authentication->getTest();

//        $this->render("register", [
//            'students' => $test
//        ]);

        $this->render("authentication/register");
    }

    public function _Login(){
        $this->render("authentication/login");
    }
}
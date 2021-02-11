<?php

use Model\Authentication;
use vendor\System\Request;
use vendor\System\System;

class AuthenticationController extends System
{
    public function _Register(Request $request)
    {
        if ($request->isPOST())
        {
            $this->redirect('/');
        }

        $this->render("authentication/register");
    }

    public function _Login(Request $request)
    {
        if ($request->isPOST())
        {
            setcookie('user_id_domotique', '1');
            $this->redirect('/');
        }
        $this->render("authentication/login");
    }
//
//    public function _Test()
//    {
//        $authentication = new Authentication();
//
//        $test = $authentication->getTest();
//
//        $this->render("register", [
//            'students' => $test
//        ]);
//
//        $this->render("authentication/register");
//    }
}
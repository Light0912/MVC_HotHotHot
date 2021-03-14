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
            $user = new Authentication();
//            $prenom = $request->get('firstname');
//            $nom = $request->get('lastname');
//            $email = $request->get('email');
//            $tel = $request->get('mobilenumber');
//            $password = $request->get('password');
//            $user->setPrenom($prenom);
//            $user->setNom($nom);
//            $user->setUsername($email);
//            $user->setMobile($tel);
//            $user->setPassword($password);
//            $user->setId("2");
//            $user->setPrenom("a");
//            $user->setNom("a");
//            $user->setUsername("a");
//            $user->setMobile("a");
//            $user->setPassword("a");
//            var_dump($user->getAllData("user"));
            var_dump($user->getAllData("user", ['id' => 1]));
            $user->create();
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
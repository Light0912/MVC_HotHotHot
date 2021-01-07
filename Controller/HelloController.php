<?php

use vendor\System\Request;
use vendor\System\System;

class HelloController extends System
{

    public function hello(Request $request) {
        $name = ($request->getUrlParam('name') !== false ? $request->getUrlParam('name') : '');
        $this->render('hello', ['name' => $name]);
    }

}
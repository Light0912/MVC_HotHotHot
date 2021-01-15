<?php

use Model\Student;
use vendor\System\System;

class AppController extends System
{
    public function app(){

        $student = new Student();

        $student_tab = $student->getStudent();
        $tab_length = count($student_tab);

        $b = [];
        for ($i = 1; $i < $tab_length; $i++){
            $a = [$student_tab[$i][1]];
            array_push($b, $a);
        }
        shuffle($b);

        $this->render("app", [
            'students' => $b
        ]);
    }

}
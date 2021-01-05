<?php

namespace Model;

use vendor\System\Parser;

class Student
{
    public function getStudent(): bool|array
    {
        return Parser::parse("student.xlsx")->rows();
    }
}
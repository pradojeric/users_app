<?php

namespace App\Services;

class StudentService
{
    public function getTempId()
    {
        $generate_number = rand(1000000000000000, 9999999999999999);

        return $generate_number;
    }

    public function getStudentId()
    {

    }
}

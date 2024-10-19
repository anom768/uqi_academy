<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

use com\bangkitanomsedhayu\uqi\academy\Entity\Student;

class StudentResponse {

    private ?Student $student;

    public function __construct(?Student $student)
    {
        $this->student = $student;
    }

    public function getStudent() :?Student {
        return $this->student;
    }

    public function setStudent(?Student $student) :void {
        $this->student = $student;
    }

}
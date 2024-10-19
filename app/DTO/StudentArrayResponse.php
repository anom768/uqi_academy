<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class StudentArrayResponse {

    private array $student;

    public function __construct(array $student)
    {
        $this->student = $student;
    }

    public function getStudent() :array {
        return $this->student;
    }

    public function setStudent(array $student) :void {
        $this->student = $student;
    }

}
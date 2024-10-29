<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class EducationArrayResponse {

    private array $educations;

    public function __construct(array $educations)
    {
        $this->educations = $educations;
    }

    public function getEducations() :array {
        return $this->educations;
    }

}
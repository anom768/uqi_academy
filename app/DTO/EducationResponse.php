<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

use com\bangkitanomsedhayu\uqi\academy\Entity\Education;

class EducationResponse {

    private ?Education $education;

    public function __construct(?Education $education)
    {
        $this->education = $education;
    }

    public function getEducation() :?Education {
        return $this->education;
    }

}
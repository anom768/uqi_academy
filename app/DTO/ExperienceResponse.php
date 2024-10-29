<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

use com\bangkitanomsedhayu\uqi\academy\Entity\Education;
use com\bangkitanomsedhayu\uqi\academy\Entity\Experience;

class ExperienceResponse {

    private ?Experience $experience;

    public function __construct(?Experience $experience)
    {
        $this->experience = $experience;
    }

    public function getExperience() :?Experience {
        return $this->experience;
    }

}
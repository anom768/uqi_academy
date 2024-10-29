<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class ExperienceArrayResponse {

    private array $experience;

    public function __construct(array $experience)
    {
        $this->experience = $experience;
    }

    public function getExperience() :array {
        return $this->experience;
    }

}
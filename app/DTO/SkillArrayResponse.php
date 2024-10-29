<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class SkillArrayResponse {

    private array $skills;

    public function __construct(array $skills)
    {
        $this->skills = $skills;
    }

    public function getSkills() :array {
        return $this->skills;
    }

}
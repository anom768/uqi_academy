<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

use com\bangkitanomsedhayu\uqi\academy\Entity\Skill;

class SkillResponse {

    private ?Skill $skill;

    public function __construct(?Skill $skill)
    {
        $this->skill = $skill;
    }

    public function getSkill() :?Skill {
        return $this->skill;
    }

}
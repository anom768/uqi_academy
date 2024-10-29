<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class SkillRequest {

    private ?string $id_student;
    private ?string $skill;
    private ?int $score;

    public function __construct(?string $id_student, ?string $skill, ?int $score)
    {
        $this->id_student = $id_student;
        $this->skill = $skill;
        $this->score = $score;
    }

    // Getter untuk photo
    public function getIdStudent(): ?string {
        return $this->id_student;
    }

    // Getter untuk fullname
    public function getSkill(): ?string {
        return $this->skill;
    }

    // Getter untuk phone
    public function getScore(): ?string {
        return $this->score;
    }

}
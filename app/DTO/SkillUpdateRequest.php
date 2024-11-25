<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class SkillUpdateRequest {

    private int $id;
    private ?string $id_student;
    private ?string $skill;
    private ?int $score;

    public function __construct(int $id, ?string $id_student, ?string $skill, ?int $score)
    {
        $this->id = $id;
        $this->id_student = $id_student;
        $this->skill = $skill;
        $this->score = $score;
    }

    public function getId() :int {
        return $this->id;
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
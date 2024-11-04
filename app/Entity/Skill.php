<?php

namespace com\bangkitanomsedhayu\uqi\academy\Entity;

class Skill {

    private int $id;
    private string $id_student;
    private string $skill;
    private int $score;

    // Constructor
    public function __construct(int $id = 0, string $id_student, string $skill , int $score) {
        $this->id = $id;
        $this->id_student = $id_student;
        $this->skill = $skill;
        $this->score = $score;
    }

    public function setId(int $id) :void {
        $this->id = $id;
    }

    // Getter untuk id
    public function getId(): int {
        return $this->id;
    }

    // Getter untuk id_student
    public function getIdStudent(): string {
        return $this->id_student;
    }

    // Getter untuk registration_date
    public function getSkill(): string {
        return $this->skill;  // Mengembalikan format tanggal dalam bentuk string
    }

    // Getter untuk year
    public function getScore(): int {
        return $this->score;
    }

}
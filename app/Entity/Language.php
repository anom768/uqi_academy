<?php

namespace com\bangkitanomsedhayu\uqi\academy\Entity;

use DateTime;

class Language {

    private int $id;
    private string $id_student;
    private string $language;
    private int $score;

    // Constructor
    public function __construct(int $id = 0, string $id_student, string $language , int $score) {
        $this->id = $id;
        $this->id_student = $id_student;
        $this->language = $language;
        $this->score = $score;
    }

    // Getter untuk id
    public function getId(): int {
        return $this->id;
    }

    // Setter untuk id
    public function setId(int $id): void {
        $this->id = $id;
    }

    // Getter untuk id_student
    public function getIdStudent(): string {
        return $this->id_student;
    }

    // Setter untuk id_student
    public function setIdStudent(string $id_student): void {
        $this->id_student = $id_student;
    }

    // Getter untuk registration_date
    public function getLanguage(): string {
        return $this->language;  // Mengembalikan format tanggal dalam bentuk string
    }

    // Setter untuk registration_date
    public function setLanguage(string $language): void {
        $this->language = $language;
    }

    // Getter untuk year
    public function getScore(): int {
        return $this->score;
    }

    // Setter untuk year
    public function setScore(int $score): void {
        $this->score = $score;
    }

}
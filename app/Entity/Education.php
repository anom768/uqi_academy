<?php

namespace com\bangkitanomsedhayu\uqi\academy\Entity;

use DateTime;

class Education {

    private int $id;
    private string $id_student;
    private string $school;
    private int $entry_year;
    private int $graduate_year;

    // Constructor
    public function __construct(int $id = 0, string $id_student, string $school , int $entry_year, int $graduate_year) {
        $this->id = $id;
        $this->id_student = $id_student;
        $this->school = $school;
        $this->entry_year = $entry_year;
        $this->graduate_year = $graduate_year;
    }

    // Getter untuk id
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id) :void {
        $this->id = $id;
    }

    // Getter untuk id_student
    public function getIdStudent(): string {
        return $this->id_student;
    }

    // Getter untuk registration_date
    public function getSchool(): string {
        return $this->school;  // Mengembalikan format tanggal dalam bentuk string
    }

    // Getter untuk year
    public function getEntryYear(): int {
        return $this->entry_year;
    }

    // Getter untuk year
    public function getGraduateYear(): int {
        return $this->graduate_year;
    }

}
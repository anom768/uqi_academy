<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class EducationRequest {

    private ?string $id_student;
    private ?string $school;
    private ?int $entry_year;
    private ?int $graduate_year;

    public function __construct(?string $id_student, ?string $school, ?int $entry_year, ?int $graduate_year)
    {
        $this->id_student = $id_student;
        $this->school = $school;
        $this->entry_year = $entry_year;
        $this->graduate_year = $graduate_year;
    }

    // Getter untuk photo
    public function getIdStudent(): ?string {
        return $this->id_student;
    }

    // Getter untuk fullname
    public function getSchool(): ?string {
        return $this->school;
    }

    // Getter untuk phone
    public function getEntryYear(): ?int {
        return $this->entry_year;
    }

    public function getGraduateYear(): ?int {
        return $this->graduate_year;
    }

}
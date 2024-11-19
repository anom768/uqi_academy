<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class EducationRequest {

    private ?string $id_student;
    private ?string $type;
    private ?string $school;
    private ?int $entry_year;
    private ?int $graduate_year;
    private ?string $address;
    private ?string $description;

    public function __construct(string $id_student, ?string $type, string $school , int $entry_year, int $graduate_year, ?string $address, ?string $description) {
        $this->id_student = $id_student;
        $this->type = $type;
        $this->school = $school;
        $this->entry_year = $entry_year;
        $this->graduate_year = $graduate_year;
        $this->address = $address;
        $this->description = $description;
    }

    // Getter untuk photo
    public function getIdStudent(): ?string {
        return $this->id_student;
    }

    public function getType(): string {
        return $this->type;
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

    public function getAddress(): string {
        return $this->address;
    }

    public function getDescriptiom(): string {
        return $this->description;
    }

}
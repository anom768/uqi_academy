<?php

namespace com\bangkitanomsedhayu\uqi\academy\Entity;

use DateTime;

class Experience {

    private int $id;
    private string $id_student;
    private string $type;
    private string $company;
    private DateTime $entry_date;
    private DateTime $end_date;
    private string $description;

    // Constructor
    public function __construct(int $id = 0, string $id_student, string $type, string $company, string $entry_date, string $end_date, string $description) {
        $this->id = $id;
        $this->id_student = $id_student;
        $this->type = $type;
        $this->company = $company;
        $this->entry_date = $entry_date;
        $this->end_date = $end_date;
        $this->description = $description;
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

    // Getter untuk registration_date
    public function getType(): string {
        return $this->type;  // Mengembalikan format tanggal dalam bentuk string
    }

    // Getter untuk registration_date
    public function getCompany(): string {
        return $this->company;  // Mengembalikan format tanggal dalam bentuk string
    }

    // Getter untuk year
    public function getEntryDate(): string {
        return $this->entry_date->format('d-m-Y');
    }

    // Getter untuk year
    public function getEndDate(): string {
        return $this->end_date->format('d-m-Y');
    }

    // Getter untuk registration_date
    public function getDescription(): string {
        return $this->description;  // Mengembalikan format tanggal dalam bentuk string
    }

}
<?php

namespace com\bangkitanomsedhayu\uqi\academy\Entity;

use DateTime;

class Batch {

    private int $id;
    private string $id_student;
    private DateTime $registration_date;
    private int $year;
    private int $batch;

    // Constructor
    public function __construct(int $id, string $id_student, string $registration_date, int $year, int $batch) {
        $this->id = $id;
        $this->id_student = $id_student;
        $this->registration_date = new DateTime($registration_date); // Menggunakan DateTime untuk tanggal
        $this->year = $year;
        $this->batch = $batch;
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
    public function getRegistrationDate(): string {
        return $this->registration_date->format('d-m-Y');  // Mengembalikan format tanggal dalam bentuk string
    }

    // Setter untuk registration_date
    public function setRegistrationDate(string $registration_date): void {
        $this->registration_date = new DateTime($registration_date);
    }

    // Getter untuk year
    public function getYear(): int {
        return $this->year;
    }

    // Setter untuk year
    public function setYear(int $year): void {
        $this->year = $year;
    }

    // Getter untuk batch
    public function getBatch(): int {
        return $this->batch;
    }

    // Setter untuk batch
    public function setBatch(int $batch): void {
        $this->batch = $batch;
    }
}
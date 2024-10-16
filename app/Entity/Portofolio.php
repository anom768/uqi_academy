<?php

namespace com\bangkitanomsedhayu\uqi\academy\Entity;

class Portofolio {

    private int $id;
    private string $id_student;
    private string $type;
    private string $portofolio_name;

    // Constructor
    public function __construct(int $id, string $id_student, string $type, string $portofolio_name) {
        $this->id = $id;
        $this->id_student = $id_student;
        $this->type = $type;
        $this->portofolio_name = $portofolio_name;
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

    // Getter untuk type
    public function getType(): string {
        return $this->type;
    }

    // Setter untuk type
    public function setType(string $type): void {
        $this->type = $type;
    }

    // Getter untuk portofolio_name
    public function getPortofolioName(): string {
        return $this->portofolio_name;
    }

    // Setter untuk portofolio_name
    public function setPortofolioName(string $portofolio_name): void {
        $this->portofolio_name = $portofolio_name;
    }

}
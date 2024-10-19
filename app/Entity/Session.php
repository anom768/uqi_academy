<?php

namespace com\bangkitanomsedhayu\uqi\academy\Entity;

class Session
{
    private string $id;
    private string $id_student;

    public function __construct(string $id, string $id_student)
    {
        $this->id = $id;
        $this->id_student = $id_student;
    }

    // Getter untuk id
    public function getId(): string {
        return $this->id;
    }

    // Setter untuk id
    public function setId(string $id): void {
        $this->id = $id;
    }

    // Getter untuk password
    public function getIdStudent(): string {
        return $this->id_student;
    }

    // Setter untuk password
    public function setIdStudent(string $id_student): void {
        $this->id_student = $id_student;
    }
}
<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class PortofolioRequest {

    private ?string $id_student;
    private ?string $type;
    private ?string $portofolio;

    public function __construct(?string $id_student, ?string $type, ?string $portofolio)
    {
        $this->id_student = $id_student;
        $this->type = $type;
        $this->portofolio = $portofolio;
    }

    // Getter untuk photo
    public function getIdStudent(): ?string {
        return $this->id_student;
    }

    // Getter untuk fullname
    public function getType(): ?string {
        return $this->type;
    }

    // Getter untuk phone
    public function getPortofolio(): ?string {
        return $this->portofolio;
    }

}
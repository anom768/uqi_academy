<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class PortofolioRequest {

    private ?string $id;
    private ?string $id_student;
    private ?string $type;
    private ?string $portofolio;

    public function __construct(?string $id, ?string $id_student, ?string $type, ?string $portofolio)
    {
        $this->id = $id;
        $this->id_student = $id_student;
        $this->type = $type;
        $this->portofolio = $portofolio;
    }

    public function getId(): ?string {
        return $this->id;
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
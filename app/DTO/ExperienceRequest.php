<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class ExperienceRequest {

    private ?string $id_student;
    private ?string $type;
    private ?string $company;
    private ?string $entry_date;
    private ?string $end_date;
    private ?string $address;
    private ?string $website;
    private ?string $description;

    public function __construct(?string $id_student, ?string $type, ?string $company, ?string $entry_date, ?string $end_date, ?string $address, ?string $website, ?string $description)
    {
        $this->id_student = $id_student;
        $this->type = $type;
        $this->company = $company;
        $this->entry_date = $entry_date;
        $this->end_date = $end_date;
        $this->address = $address;
        $this->website = $website;
        $this->description = $description;
    }

    // Getter untuk photo
    public function getIdStudent(): ?string {
        return $this->id_student;
    }

    // Getter untuk fullname
    public function getType(): ?string {
        return $this->type;
    }

    // Getter untuk fullname
    public function getCompany(): ?string {
        return $this->company;
    }

    // Getter untuk phone
    public function getEntryDate(): ?string {
        return $this->entry_date;
    }

    public function getEndDate(): ?string {
        return $this->end_date;
    }

    public function getAddress(): ?string {
        return $this->address;
    }

    public function getWebsite(): ?string {
        return $this->website;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

}
<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class StudentRegistration {

    private ?string $photo;
    private ?string $fullname;
    private ?string $phone;
    private ?string $address;
    private ?string $school;

    public function __construct(?string $photo, ?string $fullname, ?string $phone, ?string $address, ?string $school)
    {
        $this->photo = $photo;
        $this->fullname = $fullname;
        $this->phone = $phone;
        $this->address = $address;
        $this->school = $school;
    }

    // Getter untuk photo
    public function getPhoto(): ?string {
        return $this->photo;
    }

    // Getter untuk fullname
    public function getFullname(): ?string {
        return $this->fullname;
    }

    // Getter untuk phone
    public function getPhone(): ?string {
        return $this->phone;
    }

    // Getter untuk address
    public function getAddress(): ?string {
        return $this->address;
    }
    // Getter untuk school
    public function getSchool(): ?string {
        return $this->school;
    }

}
<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class StudentUpdate {

    private ?string $id;
    private ?string $password;
    private ?string $photo;
    private ?string $fullname;
    private ?string $specialist;
    private ?string $email;
    private ?string $bio;
    private ?string $phone;
    private ?string $address;
    private ?string $school;
    private ?string $status;

    public function __construct(?string $id, ?string $password, ?string $photo, ?string $fullname,
        ?string $specialist, ?string $email, ?string $bio, ?string $phone, ?string $address,
        ?string $school, ?string $status)
    {
        $this->id = $id;
        $this->password = $password;
        $this->photo = $photo;
        $this->fullname = $fullname;
        $this->specialist = $specialist;
        $this->email = $email;
        $this->bio = $bio;
        $this->phone = $phone;
        $this->address = $address;
        $this->school = $school;
        $this->status = $status;
    }

    // Getter untuk id
    public function getId(): ?string {
        return $this->id;
    }

    // Getter untuk password
    public function getPassword(): ?string {
        return $this->password;
    }

    // Getter untuk photo
    public function getPhoto(): ?string {
        return $this->photo;
    }

    // Getter untuk fullname
    public function getFullname(): ?string {
        return $this->fullname;
    }

     // Getter untuk id
     public function getSpecialist(): ?string {
        return $this->specialist;
    }

    // Getter untuk password
    public function getEmail(): ?string {
        return $this->email;
    }

    // Getter untuk photo
    public function getBio(): ?string {
        return $this->bio;
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

    // Getter untuk status
    public function getStatus(): ?string {
        return $this->status;
    }

}
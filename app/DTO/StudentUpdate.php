<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class StudentUpdate {

    private ?string $id;
    private ?string $password;
    private ?string $photo;
    private ?string $fullname;
    private ?string $phone;
    private ?string $address;
    private ?string $school;
    private ?string $status;

    public function __construct(?string $id, ?string $password, ?string $photo, ?string $fullname, ?string $phone, ?string $address, ?string $school, ?string $status)
    {
        $this->id = $id;
        $this->password = $password;
        $this->photo = $photo;
        $this->fullname = $fullname;
        $this->phone = $phone;
        $this->address = $address;
        $this->school = $school;
        $this->status = $status;
    }

    // Getter untuk id
    public function getId(): ?string {
        return $this->id;
    }

    // Setter untuk id
    public function setId(string $id): void {
        $this->id = $id;
    }

    // Getter untuk password
    public function getPassword(): ?string {
        return $this->password;
    }

    // Setter untuk password
    public function setPassword(string $password): void {
        $this->password = $password;
    }

    // Getter untuk photo
    public function getPhoto(): ?string {
        return $this->photo;
    }

    // Setter untuk photo
    public function setPhoto(string $photo): void {
        $this->photo = $photo;
    }

    // Getter untuk fullname
    public function getFullname(): ?string {
        return $this->fullname;
    }

    // Setter untuk fullname
    public function setFullname(string $fullname): void {
        $this->fullname = $fullname;
    }

    // Getter untuk phone
    public function getPhone(): ?string {
        return $this->phone;
    }

    // Setter untuk phone
    public function setPhone(string $phone): void {
        $this->phone = $phone;
    }

    // Getter untuk address
    public function getAddress(): ?string {
        return $this->address;
    }

    // Setter untuk address
    public function setAddress(string $address): void {
        $this->address = $address;
    }

    // Getter untuk school
    public function getSchool(): ?string {
        return $this->school;
    }

    // Setter untuk school
    public function setSchool(string $school): void {
        $this->school = $school;
    }

    // Getter untuk status
    public function getStatus(): ?string {
        return $this->status;
    }

    // Setter untuk status
    public function setStatus(string $status): void {
        $this->status = $status;
    }

}
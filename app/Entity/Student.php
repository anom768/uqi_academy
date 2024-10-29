<?php

namespace com\bangkitanomsedhayu\uqi\academy\Entity;

class Student {

    private string $id;
    private string $password;
    private string $temp_password;
    private string $photo;
    private string $fullname;
    private ?string $specialist;
    private ?string $email;
    private ?string $website;
    private ?string $bio;
    private string $phone;
    private string $address;
    private string $school;
    private string $status;

    public function __construct(string $id, string $password, string $temp_password, 
        string $photo, string $fullname, ?string $specialist, ?string $email, ?string $website, 
        ?string $bio, string $phone, string $address, string $school, string $status)
    {
        $this->id = $id;
        $this->password = $password;
        $this->temp_password = $temp_password;
        $this->photo = $photo;
        $this->fullname = $fullname;
        $this->specialist = $specialist;
        $this->email = $email;
        $this->website = $website;
        $this->bio = $bio;
        $this->phone = $phone;
        $this->address = $address;
        $this->school = $school;
        $this->status = $status;
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
    public function getPassword(): string {
        return $this->password;
    }

    // Setter untuk password
    public function setTempPassword(string $temp_password): void {
        $this->temp_password = $temp_password;
    }

    // Getter untuk password
    public function getTempPassword(): string {
        return $this->temp_password;
    }

    // Setter untuk password
    public function setPassword(string $password): void {
        $this->password = $password;
    }

    // Getter untuk photo
    public function getPhoto(): string {
        return $this->photo;
    }

    public function setPhoto(string $photo): void {
        $this->photo = $photo;
    }

    // Getter untuk fullname
    public function getFullname(): string {
        return $this->fullname;
    }

    public function setFullname(string $fullname): void {
        $this->fullname = $fullname;
    }

    public function getSpecialist(): ?string {
        return $this->specialist;
    }

    public function setSpecialist(?string $specialist): void {
        $this->specialist = $specialist;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(?string $email): void {
        $this->email = $email;
    }

    public function getWebsite(): ?string {
        return $this->website;
    }

    public function setWebsite(?string $website): void {
        $this->website = $website;
    }

    public function getBio(): ?string {
        return $this->bio;
    }

    public function setBio(?string $bio): void {
        $this->bio = $bio;
    }

    // Getter untuk phone
    public function getPhone(): string {
        return $this->phone;
    }

    public function setPone(string $phone): void {
        $this->phone = $phone;
    }

    // Getter untuk address
    public function getAddress(): string {
        return $this->address;
    }

    public function setAddress(string $address): void {
        $this->address = $address;
    }

    // Getter untuk school
    public function getSchool(): string {
        return $this->school;
    }

    public function setSchool(string $school): void {
        $this->school = $school;
    }

    // Getter untuk status
    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }

}
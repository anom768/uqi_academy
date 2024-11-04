<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class StudentUpdatePassword {

    private ?string $id;
    private ?string $password;
    private ?string $confirmPassword;

    public function __construct(?string $id, ?string $password, ?string $confirmPassword)
    {
        $this->id = $id;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }

    // Getter untuk id
    public function getId(): ?string {
        return $this->id;
    }

    // Getter untuk photo
    public function getPassword(): ?string {
        return $this->password;
    }

    // Getter untuk fullname
    public function getConfirmPassword(): ?string {
        return $this->confirmPassword;
    }

}
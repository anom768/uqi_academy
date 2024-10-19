<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class StudentLogin {

    private ?string $id;
    private ?string $password;

    public function __construct(?string $id, ?string $password)
    {
        $this->id = $id;
        $this->password = $password;
    }

    // Getter untuk id
    public function getId(): ?string {
        return $this->id;
    }

    // Setter untuk id
    public function setId(string $id): void {
        $this->id = $id;
    }

    // Getter untuk photo
    public function getPassword(): ?string {
        return $this->password;
    }

    // Setter untuk photo
    public function setPassword(string $password): void {
        $this->password = $password;
    }

}
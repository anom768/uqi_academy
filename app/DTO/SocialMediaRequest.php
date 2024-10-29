<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class SocialMediaRequest {

    private ?string $id_student;
    private ?string $platform;
    private ?string $url;

    public function __construct(?string $id_student, ?string $platform, ?string $url)
    {
        $this->id_student = $id_student;
        $this->platform = $platform;
        $this->url = $url;
    }

    // Getter untuk photo
    public function getIdStudent(): ?string {
        return $this->id_student;
    }

    // Setter untuk photo
    public function setIdStudent(string $id_student): void {
        $this->id_student = $id_student;
    }

    // Getter untuk fullname
    public function getPlatform(): ?string {
        return $this->platform;
    }

    // Setter untuk fullname
    public function setPlatform(string $platform): void {
        $this->platform = $platform;
    }

    // Getter untuk phone
    public function getUrl(): ?string {
        return $this->url;
    }

    // Setter untuk phone
    public function setUrl(string $url): void {
        $this->url = $url;
    }

}
<?php

namespace com\bangkitanomsedhayu\uqi\academy\Entity;

class SocialMedia {

    private string $id;
    private string $id_student;
    private string $platform;
    private string $url;

    public function __construct(string $id, string $id_student, string $platform, string $url)
    {
        $this->id = $id;
        $this->id_student = $id_student;
        $this->platform = $platform;
        $this->url = $url;
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
    public function getIdStudent(): string {
        return $this->id_student;
    }

    // Setter untuk password
    public function setIdStudent(string $id_student): void {
        $this->id_student = $id_student;
    }

    // Getter untuk password
    public function getPlatform(): string {
        return $this->platform;
    }

    // Setter untuk password
    public function setPlatform(string $platform): void {
        $this->platform = $platform;
    }

    // Getter untuk photo
    public function getUrl(): string {
        return $this->url;
    }

    // Setter untuk photo
    public function seturl(string $url): void {
        $this->url = $url;
    }

}
<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class LanguageRequest {

    private ?string $id_student;
    private ?string $language;
    private ?int $score;

    public function __construct(?string $id_student, ?string $language, ?int $score)
    {
        $this->id_student = $id_student;
        $this->language = $language;
        $this->score = $score;
    }

    // Getter untuk photo
    public function getIdStudent(): ?string {
        return $this->id_student;
    }

    // Getter untuk fullname
    public function getLanguage(): ?string {
        return $this->language;
    }

    // Getter untuk phone
    public function getScore(): ?string {
        return $this->score;
    }

}
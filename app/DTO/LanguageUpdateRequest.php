<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class LanguageUpdateRequest {

    private int $id;
    private ?string $id_student;
    private ?string $language;
    private ?int $score;

    public function __construct(int $id, ?string $id_student, ?string $language, ?int $score)
    {
        $this->id = $id;
        $this->id_student = $id_student;
        $this->language = $language;
        $this->score = $score;
    }

    public function getId() :int {
        return $this->id;
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
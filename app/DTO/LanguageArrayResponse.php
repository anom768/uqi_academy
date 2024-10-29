<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class LanguageArrayResponse {

    private array $languages;

    public function __construct(array $languages)
    {
        $this->languages = $languages;
    }

    public function getLanguages() :array {
        return $this->languages;
    }

}
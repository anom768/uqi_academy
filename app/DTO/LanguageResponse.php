<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

use com\bangkitanomsedhayu\uqi\academy\Entity\Language;
use com\bangkitanomsedhayu\uqi\academy\Entity\Skill;

class LanguageResponse {

    private ?Language $language;

    public function __construct(?Language $language)
    {
        $this->language = $language;
    }

    public function getLanguage() :?Language {
        return $this->language;
    }

}
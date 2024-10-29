<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

use com\bangkitanomsedhayu\uqi\academy\Entity\SocialMedia;
use com\bangkitanomsedhayu\uqi\academy\Entity\Student;

class SocialMediaResponse {

    private ?SocialMedia $socialMedia;

    public function __construct(?SocialMedia $socialMedia)
    {
        $this->socialMedia = $socialMedia;
    }

    public function getSocialMedia() :?SocialMedia {
        return $this->socialMedia;
    }

    public function setSocialMedia(?SocialMedia $socialMedia) :void {
        $this->socialMedia = $socialMedia;
    }

}
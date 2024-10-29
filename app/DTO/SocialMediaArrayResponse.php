<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class SocialMediaArrayResponse {

    private array $socialMedias;

    public function __construct(array $socialMedias)
    {
        $this->socialMedias = $socialMedias;
    }

    public function getSocialMedias() :array {
        return $this->socialMedias;
    }

    public function setSocialMedias(array $socialMedias) :void {
        $this->socialMedias = $socialMedias;
    }

}
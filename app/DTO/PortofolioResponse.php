<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

use com\bangkitanomsedhayu\uqi\academy\Entity\Portofolio;

class PortofolioResponse {

    private ?Portofolio $portofolio;

    public function __construct(?Portofolio $portofolio)
    {
        $this->portofolio = $portofolio;
    }

    public function getPortofolio() :?Portofolio {
        return $this->portofolio;
    }

}
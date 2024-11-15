<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class PortofolioArrayResponse {

    private array $portofolio;

    public function __construct(array $portofolio)
    {
        $this->portofolio = $portofolio;
    }

    public function getPortofolio() :array {
        return $this->portofolio;
    }

}
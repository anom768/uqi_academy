<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Portofolio;

interface PortofolioRepository {

    function add(Portofolio $portofolio) :Portofolio;
    function getAll() :array;
    function deleteByID(int $id) :void;
    function deleteAll() :void;

}
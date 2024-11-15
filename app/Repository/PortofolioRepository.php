<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Portofolio;

interface PortofolioRepository {

    function add(Portofolio $portofolio) :Portofolio;
    function getAll() :array;
    function getByIDStudent(string $id_student) :array;
    function delete(string $id_student, string $portofolio) :void;
    function deleteAll() :void;

}
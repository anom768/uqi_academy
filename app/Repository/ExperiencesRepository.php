<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Experience;

interface ExperiencesRepository {
    function add(Experience $experience) :Experience;
    function getByIDStudent(string $id_student) :array;
    function delete(int $id) :void;
    function deleteAll() :void;
}
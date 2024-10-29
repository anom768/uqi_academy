<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Education;

interface EducationRepository {
    function add(Education $education) :Education;
    function getByIDStudent(string $id_student) :array;
    function delete(string $id_student, string $school) :void;
    function deleteAll() :void;
}
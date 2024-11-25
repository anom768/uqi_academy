<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Education;

interface EducationRepository {
    function add(Education $education) :Education;
    function getByIDStudent(string $id_student) :array;
    function update(Education $newEducation) :Education;
    function delete(int $id) :void;
    function deleteAll() :void;
}
<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Student;

interface StudentRepository {

    function add(Student $student) :Student;
    function getByID(string $id) :?Student;
    function getByName(string $name) :?Student;
    function getByPhone(string $phone) :?Student;
    function getAll() :array;
    function update(Student $newStudent) :Student;
    function deleteAll() :void;

}
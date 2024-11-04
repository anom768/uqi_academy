<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Student;

interface StudentRepository {

    function add(Student $student) :Student;
    function getByID(string $id) :?Student;
    function getByName(string $name) :?Student;
    function getByPhone(string $phone) :?Student;
    function getByEmail(string $email) :?Student;
    function getAll() :array;
    function update(Student $newStudent) :Student;
    function updateProfile(Student $newStudent) :Student;
    function updatePassword(string $id, string $password) :Student;
    function deleteAll() :void;

}
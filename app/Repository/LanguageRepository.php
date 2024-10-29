<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Language;

interface LanguageRepository {
    function add(Language $language) :Language;
    function getByIDStudent(string $id_student) :array;
    function delete(string $id_student, string $language) :void;
    function deleteAll() :void;
}
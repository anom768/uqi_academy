<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Language;

interface LanguageRepository {
    function add(Language $language) :Language;
    function getByIDStudent(string $id_student) :array;
    function delete(int $id) :void;
    function deleteAll() :void;
}
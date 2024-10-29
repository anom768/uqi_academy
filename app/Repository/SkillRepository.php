<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Batch;
use com\bangkitanomsedhayu\uqi\academy\Entity\Skill;

interface SkillRepository {
    function add(Skill $skill) :Skill;
    function getByIDStudent(string $id_student) :array;
    function delete(string $id_student, string $skill) :void;
    function deleteAll() :void;
}
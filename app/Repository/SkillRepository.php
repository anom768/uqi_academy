<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Skill;

interface SkillRepository {
    function add(Skill $skill) :Skill;
    function getByIDStudent(string $id_student) :array;
    function delete(int $id) :void;
    function deleteAll() :void;
}
<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\DTO\SkillArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\SkillRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\SkillResponse;

interface SkillService {

    function add(SkillRequest $request) :SkillResponse;
    function getByIdStudent(string $id_student) :SkillArrayResponse;
    function delete(string $id_student, string $skill);

}
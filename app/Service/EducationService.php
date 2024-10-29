<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\DTO\EducationArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\EducationRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\EducationResponse;

interface EducationService {

    function add(EducationRequest $request) :EducationResponse;
    function getByIdStudent(string $id_student) :EducationArrayResponse;
    function delete(string $id_student, string $school);

}
<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\DTO\EducationArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\EducationRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\EducationResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\EducationUpdateRequest;

interface EducationService {

    function add(EducationRequest $request) :EducationResponse;
    function getByIdStudent(string $id_student) :EducationArrayResponse;
    function update(EducationUpdateRequest $request) :EducationResponse;
    function delete(int $id);

}
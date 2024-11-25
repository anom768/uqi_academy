<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\DTO\ExperienceArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\ExperienceRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\ExperienceResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\ExperienceUpdateRequest;

interface ExperienceService {

    function add(ExperienceRequest $request) :ExperienceResponse;
    function getByIdStudent(string $id_student) :ExperienceArrayResponse;
    function update(ExperienceUpdateRequest $request) : ExperienceResponse;
    function delete(int $id);

}
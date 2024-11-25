<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageUpdateRequest;

interface LanguageService {

    function add(LanguageRequest $request) :LanguageResponse;
    function getByIdStudent(string $id_student) :LanguageArrayResponse;
    function update(LanguageUpdateRequest $request) :LanguageResponse;
    function delete(int $id);

}
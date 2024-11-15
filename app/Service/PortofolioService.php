<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\DTO\PortofolioArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\PortofolioRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\PortofolioResponse;

interface PortofolioService {

    function add(PortofolioRequest $request) :PortofolioResponse;
    function getByIdStudent(string $id_student) :PortofolioArrayResponse;
    function delete(string $id_student, string $language);

}
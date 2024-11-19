<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\DTO\StudentBatchArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentBatchResponse;

interface StudentBatchService {

    function getByID(string $id) :?StudentBatchResponse;
    function getAll() :StudentBatchArrayResponse;

}
<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\StudentBatch;

interface StudentBatchRepository {

    function getByID(string $id) :?StudentBatch;
    function getAll() :array;

}
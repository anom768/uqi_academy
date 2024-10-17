<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Batch;

interface BatchRepository {
    function add(Batch $batch) :Batch;
    function getByIDStudent(string $id_student) :?Batch;
    function getByBatch(int $year, int $batch) :array;
    function getAll() :array;
    function update(Batch $newbatch) :Batch;
    function deleteAll() :void;
}
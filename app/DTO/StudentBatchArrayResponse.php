<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

class StudentBatchArrayResponse {

    private array $studentBatch;

    public function __construct(array $studentBatch)
    {
        $this->studentBatch = $studentBatch;
    }

    public function getStudentBatch() : array {
        return $this->studentBatch;
    }

}
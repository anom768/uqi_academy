<?php

namespace com\bangkitanomsedhayu\uqi\academy\DTO;

use com\bangkitanomsedhayu\uqi\academy\Entity\StudentBatch;

class StudentBatchResponse {

    private ?StudentBatch $studentBatch;

    public function __construct(?StudentBatch $studentBatch)
    {
        $this->studentBatch = $studentBatch;
    }

    public function getStudentBatch() : ?StudentBatch {
        return $this->studentBatch;
    }

}
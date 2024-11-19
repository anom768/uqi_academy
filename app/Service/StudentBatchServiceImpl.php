<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\DTO\StudentBatchArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentBatchResponse;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentBatchRepository;

class StudentBatchServiceImpl implements StudentBatchService {

    private StudentBatchRepository $studentBatchRepository;

    public function __construct(StudentBatchRepository $studentBatchRepository)
    {
        $this->studentBatchRepository = $studentBatchRepository;
    }

    public function getByID(string $id): ?StudentBatchResponse
    {
        return new StudentBatchResponse($this->studentBatchRepository->getByID($id));
    }

    public function getAll(): StudentBatchArrayResponse
    {
        return new StudentBatchArrayResponse($this->studentBatchRepository->getAll());
    }

}
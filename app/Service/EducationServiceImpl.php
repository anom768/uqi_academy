<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\EducationArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\EducationRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\EducationResponse;
use com\bangkitanomsedhayu\uqi\academy\Entity\Education;
use com\bangkitanomsedhayu\uqi\academy\Helper\ServiceHelper;
use com\bangkitanomsedhayu\uqi\academy\Repository\EducationRepository;
use Exception;

class EducationServiceImpl implements EducationService {
    
    private EducationRepository $educationRepository;

    public function __construct(EducationRepository $educationRepository)
    {
        $this->educationRepository = $educationRepository;
    }

    public function add(EducationRequest $request): EducationResponse
    {
        ServiceHelper::educationAddCheck($request);

        try {
            Database::beginTransaction();
            $education = new Education(0, $request->getIdStudent(), $request->getSchool(), $request->getEntryYear(), $request->getGraduateYear());
            $this->educationRepository->add($education);

            $educationResponse = new EducationResponse($education);
            
            Database::commitTransaction();
            return $educationResponse;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function getByIdStudent(string $id_student): EducationArrayResponse
    {
        return new EducationArrayResponse($this->educationRepository->getByIdStudent($id_student));
    }

    public function delete(int $id)
    {
        $this->educationRepository->delete($id);
    }

}
<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\ExperienceArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\ExperienceRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\ExperienceResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\ExperienceUpdateRequest;
use com\bangkitanomsedhayu\uqi\academy\Entity\Experience;
use com\bangkitanomsedhayu\uqi\academy\Helper\ServiceHelper;
use com\bangkitanomsedhayu\uqi\academy\Repository\ExperiencesRepository;
use Exception;

class ExperienceServiceImpl implements ExperienceService {
    
    private ExperiencesRepository $experienceRepository;

    public function __construct(ExperiencesRepository $experienceRepository)
    {
        $this->experienceRepository = $experienceRepository;
    }

    public function add(ExperienceRequest $request): ExperienceResponse
    {
        ServiceHelper::experienceAddCheck($request);

        try {
            Database::beginTransaction();
            $experience = new Experience(0, $request->getIdStudent(), $request->getType(), $request->getCompany(), $request->getEntryDate(), $request->getEndDate(), $request->getAddress(), $request->getWebsite(), $request->getDescription());

            $this->experienceRepository->add($experience);
            
            $experienceResponse = new ExperienceResponse($experience);
            
            Database::commitTransaction();
            return $experienceResponse;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function getByIdStudent(string $id_student): ExperienceArrayResponse
    {
        return new ExperienceArrayResponse($this->experienceRepository->getByIdStudent($id_student));
    }

    public function update(ExperienceUpdateRequest $request): ExperienceResponse
    {
        ServiceHelper::experienceUpdateCheck($request);

        try {
            Database::beginTransaction();
            $experience = new Experience($request->getId(), $request->getIdStudent(), $request->getType(), $request->getCompany(), $request->getEntryDate(), $request->getEndDate(), $request->getAddress(), $request->getWebsite(), $request->getDescription());

            $this->experienceRepository->update($experience);
            
            $experienceResponse = new ExperienceResponse($experience);
            
            Database::commitTransaction();
            return $experienceResponse;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function delete(int $id)
    {
        $this->experienceRepository->delete($id);
    }

}
<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\SkillArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\SkillRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\SkillResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\SkillUpdateRequest;
use com\bangkitanomsedhayu\uqi\academy\Entity\Skill;
use com\bangkitanomsedhayu\uqi\academy\Helper\ServiceHelper;
use com\bangkitanomsedhayu\uqi\academy\Repository\SkillRepository;
use Exception;

class SkillServiceImpl implements SkillService {
    
    private SkillRepository $skillRepository;

    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    public function add(SkillRequest $request): SkillResponse
    {
        ServiceHelper::skillAddCheck($request);

        try {
            Database::beginTransaction();
            $skill = new Skill(0, $request->getIdStudent(), $request->getSkill(), $request->getScore());
            $this->skillRepository->add($skill);

            $skillResponse = new SkillResponse($skill);
            
            Database::commitTransaction();
            return $skillResponse;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function update(SkillUpdateRequest $request): SkillResponse
    {
        ServiceHelper::skillUpdateCheck($request);

        try {
            Database::beginTransaction();
            $skill = new Skill($request->getId(), $request->getIdStudent(), $request->getSkill(), $request->getScore());
            $this->skillRepository->update($skill);

            $skillResponse = new SkillResponse($skill);
            
            Database::commitTransaction();
            return $skillResponse;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function getByIdStudent(string $id_student): SkillArrayResponse
    {
        return new SkillArrayResponse($this->skillRepository->getByIdStudent($id_student));
    }

    public function delete(int $id)
    {
        $this->skillRepository->delete($id);
    }

}
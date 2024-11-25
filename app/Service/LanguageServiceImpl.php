<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageUpdateRequest;
use com\bangkitanomsedhayu\uqi\academy\Entity\Language;
use com\bangkitanomsedhayu\uqi\academy\Helper\ServiceHelper;
use com\bangkitanomsedhayu\uqi\academy\Repository\LanguageRepository;
use Exception;

class LanguageServiceImpl implements LanguageService {
    
    private LanguageRepository $languageRepository;

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    public function add(LanguageRequest $request): LanguageResponse
    {
        ServiceHelper::languageAddCheck($request);

        try {
            Database::beginTransaction();
            $language = new Language(0, $request->getIdStudent(), $request->getLanguage(), $request->getScore());
            $this->languageRepository->add($language);

            $languageResponse = new LanguageResponse($language);
            
            Database::commitTransaction();
            return $languageResponse;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function update(LanguageUpdateRequest $request): LanguageResponse
    {
        ServiceHelper::languageUpdateCheck($request);

        try {
            Database::beginTransaction();
            $language = new Language($request->getId(), $request->getIdStudent(), $request->getLanguage(), $request->getScore());
            $this->languageRepository->update($language);

            $languageResponse = new LanguageResponse($language);
            
            Database::commitTransaction();
            return $languageResponse;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function getByIdStudent(string $id_student): LanguageArrayResponse
    {
        return new LanguageArrayResponse($this->languageRepository->getByIdStudent($id_student));
    }

    public function delete(int $id)
    {
        $this->languageRepository->delete($id);
    }

}
<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\SocialMediaArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\SocialMediaRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\SocialMediaResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\SocialMediaUpdate;
use com\bangkitanomsedhayu\uqi\academy\Entity\SocialMedia;
use com\bangkitanomsedhayu\uqi\academy\Helper\ServiceHelper;
use com\bangkitanomsedhayu\uqi\academy\Repository\SocialMediaRepository;
use Exception;

class SocialMediaServiceImpl implements SocialMediaService {
    
    private SocialMediaRepository $socialMediaRepository;

    public function __construct(SocialMediaRepository $socialMediaRepository)
    {
        $this->socialMediaRepository = $socialMediaRepository;
    }

    public function add(SocialMediaRequest $request): SocialMediaResponse
    {
        ServiceHelper::socialMediaAddCheck($request);
        try {
            Database::beginTransaction();
            $socialMedia = new SocialMedia(0, $request->getIdStudent(), $request->getPlatform(), $request->getUrl());
            $this->socialMediaRepository->add($socialMedia);

            $socialMediaResponse = new SocialMediaResponse($socialMedia);
            
            Database::commitTransaction();
            return $socialMediaResponse;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function getByIdStudent(string $id_student): SocialMediaArrayResponse
    {
        return new SocialMediaArrayResponse($this->socialMediaRepository->getByIdStudent($id_student));
    }

    public function getAll(): SocialMediaArrayResponse
    {
        return new SocialMediaArrayResponse($this->socialMediaRepository->getAll());
    }

    public function update(SocialMediaUpdate $request): SocialMediaResponse
    {
        ServiceHelper::socialMediaUpdateCheck($request);
        try {
            Database::beginTransaction();
            $socialMedia = new SocialMedia($request->getId(), $request->getIdStudent(), $request->getPlatform(), $request->getUrl());
            $this->socialMediaRepository->update($socialMedia);
            Database::commitTransaction();
            return new SocialMediaResponse($socialMedia);
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function delete(int $id): void
    {
        $this->socialMediaRepository->delete($id);
    }

}
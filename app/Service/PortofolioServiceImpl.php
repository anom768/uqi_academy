<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\PortofolioArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\PortofolioRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\PortofolioResponse;
use com\bangkitanomsedhayu\uqi\academy\Entity\Language;
use com\bangkitanomsedhayu\uqi\academy\Entity\Portofolio;
use com\bangkitanomsedhayu\uqi\academy\Helper\ServiceHelper;
use com\bangkitanomsedhayu\uqi\academy\Repository\LanguageRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\PortofolioRepository;
use Exception;

class PortofolioServiceImpl implements PortofolioService {
    
    private PortofolioRepository $portofolioRepository;

    public function __construct(PortofolioRepository $portofolioRepository)
    {
        $this->portofolioRepository = $portofolioRepository;
    }

    public function add(PortofolioRequest $request): PortofolioResponse
    {
        ServiceHelper::portofolioAddCheck($request);

        try {
            Database::beginTransaction();
            $portofolio = new Portofolio($request->getId(), $request->getIdStudent(), $request->getType(), $request->getPortofolio());
            $this->portofolioRepository->add($portofolio);

            $portofolioResponse = new PortofolioResponse($portofolio);
            
            Database::commitTransaction();
            return $portofolioResponse;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function getByIdStudent(string $id_student): PortofolioArrayResponse
    {
        return new PortofolioArrayResponse($this->portofolioRepository->getByIdStudent($id_student));
    }

    public function delete(string $id)
    {
        $this->portofolioRepository->delete($id);
    }

}
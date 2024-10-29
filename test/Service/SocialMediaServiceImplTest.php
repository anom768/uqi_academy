<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\SocialMediaRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\SocialMediaResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\SocialMediaUpdate;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentRegistration;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentResponse;
use com\bangkitanomsedhayu\uqi\academy\Repository\BatchRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\BatchRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\PortofolioRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\PortofolioRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\SessionRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\SessionRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\SocialMediaRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\SocialMediaRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepositoryImpl;
use PHPUnit\Framework\TestCase;

class SocialMediaServiceImplTest extends TestCase {

    private StudentRepository $studentRepository;
    private PortofolioRepository $portofolioRepository;
    private BatchRepository $batchRepository;
    private SessionRepository $sessionRepository;
    private SocialMediaRepository $socialMediaRepository;
    private SocialMediaService $socialMediaService;
    private StudentService $studentService;

    function setUp(): void
    {
        $connection = Database::getConnection();
        $this->studentRepository = new StudentRepositoryImpl($connection);
        $this->portofolioRepository = new PortofolioRepositoryImpl($connection);
        $this->batchRepository = new BatchRepositoryImpl($connection);
        $this->sessionRepository = new SessionRepositoryImpl($connection);
        $this->socialMediaRepository = new SocialMediaRepositoryImpl($connection);
        $this->studentService = new StudentServiceImpl($this->studentRepository, $this->batchRepository);
        $this->socialMediaService = new SocialMediaServiceImpl($this->socialMediaRepository);

        $this->socialMediaRepository->deleteAll();
        $this->sessionRepository->deleteAll();
        $this->batchRepository->deleteAll();
        $this->portofolioRepository->deleteAll();
        $this->studentRepository->deleteAll();
    }

    private function studentRegistration() : StudentResponse {
        $request = new StudentRegistration("bangkit.jpg", "BAS", "089", "jalan", "smk");
        $student = $this->studentService->register($request, 2024, 1);
        return $student;
    }

    private function socialMediaAdd(string $id_student) : SocialMediaResponse {
        $request = new SocialMediaRequest($id_student, "facebook", "url facebook");
        $request2 = new SocialMediaRequest($id_student, "instagram", "url instagram");

        $socialMedia = $this->socialMediaService->add($request);
        $this->socialMediaService->add($request);
        return $socialMedia;
    }

    function testSocialMediaAddSuccess() {
        $student = $this->studentRegistration()->getStudent();
        $socialMedia = $this->socialMediaAdd($student->getId())->getSocialMedia();

        self::assertEquals($socialMedia->getIdStudent(), $student->getId());
    }

    function testGetByIDStudentSuccess() {
        $response = $this->studentRegistration();
        $this->socialMediaAdd($response->getStudent()->getId());
        $socialMedia = $this->socialMediaService->getbyIdStudent($response->getStudent()->getId());
        self::assertEquals(2, sizeof($socialMedia->getSocialMedias()));
    }

    function testGetByIDNotFound() {
        $response = $this->socialMediaService->getByIdStudent("notfound");
        self::assertEquals(0, sizeof($response->getSocialMedias()));
    }

    function testGetAllSuccess() {
        $student = $this->studentRegistration()->getStudent();
        $this->socialMediaAdd($student->getId());

        $response = $this->socialMediaService->getAll();
        self::assertEquals(2, sizeof($response->getSocialMedias()));
    }

    function testGetAllNotFound() {
        $response = $this->socialMediaService->getAll();
        self::assertEquals(0, sizeof($response->getSocialMedias()));
    }

    function testUpdateSuccess() {
        $student = $this->studentRegistration()->getStudent();
        $this->socialMediaAdd($student->getId());

        $request = new SocialMediaUpdate($student->getId(), "facebook", "new url facebook");
        $response = $this->socialMediaService->update($request);
        self::assertNotNull($response->getSocialMedia());
    }

}
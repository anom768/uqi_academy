<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\Entity\SocialMedia;
use com\bangkitanomsedhayu\uqi\academy\Entity\Student;
use PHPUnit\Framework\TestCase;

class SocialMediaRepositoryImplTest extends TestCase {

    private StudentRepository $studentRepository;
    private BatchRepository $batchRepository;
    private SocialMediaRepository $socialMediaRepository;
    private SessionRepository $sessionRepository;

    function setUp(): void
    {
        $connection = Database::getConnection();
        $this->studentRepository = new StudentRepositoryImpl($connection);
        $this->batchRepository = new BatchRepositoryImpl($connection);
        $this->socialMediaRepository = new SocialMediaRepositoryImpl($connection);
        $this->sessionRepository = new SessionRepositoryImpl($connection);

        $this->sessionRepository->deleteAll();
        $this->socialMediaRepository->deleteAll();
        $this->batchRepository->deleteAll();
        $this->studentRepository->deleteAll();
    }

    private function addStudent() : Student {
        $student = $this->studentRepository->add(
            new Student("student-01", "rahasia", "rahasia", "bangkit.jpg", "BAS", "089", "jalan", "smk", "enabled")
        );
        return $student;
    }

    private function addSocialMedia(string $id_student) :SocialMedia {
        $socialMedia = $this->socialMediaRepository->add(
            new SocialMedia(0, $id_student, "facebook", "url facebook")
        );
        return $socialMedia;
    }

    function testAddSuccess() {
        $student = $this->addStudent();
        $socialMedia = $this->addSocialMedia($student->getId());
        
        self::assertEquals($student->getId(), $socialMedia->getIdStudent());
    }

    function testGetByIDStudent() {
        $student = $this->addStudent();
        $this->addSocialMedia($student->getId());

        $socialMedias = $this->socialMediaRepository->getByIDStudent($student->getId());
        self::assertEquals(1, sizeof($socialMedias));
    }

    function testGetByIDStudentNotFound() {
        self::assertEquals(0, sizeof($this->socialMediaRepository->getByIDStudent("null")));
    }

    function testGetAll() {
        $student = $this->addStudent();
        $this->addSocialMedia($student->getId());

        $socialMedias = $this->socialMediaRepository->getAll();
        self::assertEquals(1, sizeof($socialMedias));
    }

    function testGetAllNotFound() {
        $socialMedias = $this->socialMediaRepository->getAll();
        self::assertEquals(0, sizeof($socialMedias));
    }

    function testUpdate() {
        $student = $this->addStudent();
        $socialMedia = $this->addSocialMedia($student->getId());

        $socialMedia->seturl("new url");
        $newSocialMedia = $this->socialMediaRepository->update($socialMedia);
        self::assertEquals("new url", $newSocialMedia->getUrl());
    }

}
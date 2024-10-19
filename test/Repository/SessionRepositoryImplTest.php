<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\Entity\Session;
use com\bangkitanomsedhayu\uqi\academy\Entity\Student;
use PHPUnit\Framework\TestCase;

class SessionRepositoryImplTest extends TestCase
{
    private SessionRepository $sessionRepository;
    private StudentRepository $studentRepository;
    private BatchRepository $batchRepository;

    protected function setUp():void
    {
        $this->studentRepository = new StudentRepositoryImpl(Database::getConnection());
        $this->sessionRepository = new SessionRepositoryImpl(Database::getConnection());
        $this->batchRepository = new BatchRepositoryImpl(Database::getConnection());

        $this->batchRepository->deleteAll();
        $this->sessionRepository->deleteAll();
        $this->studentRepository->deleteAll();
    }

    private function addStudent() : Student {
        $student = $this->studentRepository->add(
            new Student("student-01", "rahasia", "bangkit.jpg", "BAS", "089", "jalan", "smk", "enabled")
        );
        return $student;
    }

    public function testSaveSuccess()
    {
        $student = $this->addStudent(); 
        $session = $this->sessionRepository->save(new Session(uniqid(), $student->getId()));

        self::assertEquals($student->getId(), $session->getIdStudent());
    }

    public function testDeleteByIdSuccess()
    {
        $student = $this->addStudent(); 
        $session = $this->sessionRepository->save(new Session(uniqid(), $student->getId()));

        $this->sessionRepository->deleteById($session->getId());

        $result = $this->sessionRepository->getByID($session->getId());
        self::assertNull($result);
    }

    public function testFindByIdNotFound()
    {
        $result = $this->sessionRepository->getByID('notfound');
        self::assertNull($result);
    }

}
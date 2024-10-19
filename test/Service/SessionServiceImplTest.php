<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

require_once __DIR__ . '/../Helper/HelperTest.php';

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\Entity\Session;
use com\bangkitanomsedhayu\uqi\academy\Entity\Student;
use com\bangkitanomsedhayu\uqi\academy\Repository\SessionRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\SessionRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepositoryImpl;
use PHPUnit\Framework\TestCase;

class SessionServiceImplTest extends TestCase
{
    private SessionService $sessionService;
    private SessionRepository $sessionRepository;
    private StudentRepository $studentRepository;

    protected function setUp():void
    {
        $this->sessionRepository = new SessionRepositoryImpl(Database::getConnection());
        $this->studentRepository = new StudentRepositoryImpl(Database::getConnection());
        $this->sessionService = new SessionServiceImpl($this->sessionRepository, $this->studentRepository);

        $this->sessionRepository->deleteAll();
        $this->studentRepository->deleteAll();
    }

    private function addStudent() : Student {
        $student = $this->studentRepository->add(
            new Student("student-01", "rahasia", "bangkit.jpg", "BAS", "089", "jalan", "smk", "enabled")
        );
        return $student;
    }

    public function testCreate()
    {
        $student = $this->addStudent();
        $session = $this->sessionService->create($student->getId());
        $this->expectOutputRegex(sprintf("[SANTUN-JASA-DALAM-SERUNI: %s]", $session->getId()));

        $result = $this->sessionRepository->getById($session->getId());

        self::assertEquals("student-01", $result->getIdStudent());
    }

    public function testDestroy()
    {
        $student = $this->addStudent();
        $session = new Session(uniqid(), $student->getId());

        $this->sessionRepository->save($session);

        $_COOKIE[SessionServiceImpl::$COOKIE_NAME] = $session->getId();

        $this->sessionService->destroy();

        $this->expectOutputRegex("[SANTUN-JASA-DALAM-SERUNI: ]");

        $result = $this->sessionRepository->getById($session->getId());
        self::assertNull($result);
    }

    public function testCurrent()
    {
        $student = $this->addStudent();
        $session = new Session(uniqid(), $student->getId());

        $this->sessionRepository->save($session);

        $_COOKIE[SessionServiceImpl::$COOKIE_NAME] = $session->getId();

        $user = $this->sessionService->current();

        self::assertEquals($session->getIdStudent(), $user->getId());
    }

}
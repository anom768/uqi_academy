<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentLogin;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentRegistration;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdate;
use com\bangkitanomsedhayu\uqi\academy\Repository\BatchRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\BatchRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\PortofolioRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\PortofolioRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\SessionRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\SessionRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepositoryImpl;
use Exception;
use PHPUnit\Framework\TestCase;

class StudentServiceImplTest extends TestCase {

    private StudentRepository $studentRepository;
    private PortofolioRepository $portofolioRepository;
    private BatchRepository $batchRepository;
    private SessionRepository $sessionRepository;
    private StudentService $studentService;

    function setUp(): void
    {
        $connection = Database::getConnection();
        $this->studentRepository = new StudentRepositoryImpl($connection);
        $this->portofolioRepository = new PortofolioRepositoryImpl($connection);
        $this->batchRepository = new BatchRepositoryImpl($connection);
        $this->sessionRepository = new SessionRepositoryImpl($connection);
        $this->studentService = new StudentServiceImpl($this->studentRepository, $this->batchRepository);

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

    function testStudentRegistrationSuccess() {
        $student = $this->studentRegistration()->getStudent();
        self::assertNotEmpty($student->getId());
        self::assertNotEmpty($student->getPassword());

        $batch = $this->batchRepository->getByIDStudent($student->getId());
        self::assertEquals($batch->getIdStudent(), $student->getId());
    }

    function testStudentRegistrationEmpty() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("All data is required");

        $request = new StudentRegistration("", "", "", "", "", "");
        $this->studentService->register($request, 2024, 1);
    }

    function testStudentRegistrationNull() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("All data is required");

        $request = new StudentRegistration(null, null, null, null, null, null);
        $this->studentService->register($request, 2024, 1);
    }

    function testStudentRegistrationDuplicatePhone() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Number phone is already used");

        $request = new StudentRegistration("bangkit.jpg", "BAS", "089", "jalan", "smk");
        $this->studentService->register($request, 2024, 1)->getStudent();
        $this->studentService->register($request, 2024, 1)->getStudent();
    }

    function testGetByIDSuccess() {
        $response = $this->studentRegistration();
        $student = $this->studentService->getByID($response->getStudent()->getId());
        self::assertNotNull($student);
    }

    function testGetByIDNotFound() {
        $response = $this->studentService->getByID("notfound");
        self::assertNull($response->getStudent());
    }

    function testGetByNameSuccess() {
        $response = $this->studentRegistration();
        $student = $this->studentService->getByName($response->getStudent()->getFullname());
        self::assertNotNull($student);
    }

    function testGetBynameNotFound() {
        $response = $this->studentService->getByName("notfound");
        self::assertNull($response->getStudent());
    }

    function testGetAllSuccess() {
        $this->studentRegistration();
        $student = $this->studentService->getAll();
        self::assertEquals(1, sizeof($student->getStudent()));
    }

    function testGetAllNotFound() {
        $response = $this->studentService->getAll();
        self::assertEquals(0, sizeof($response->getStudent()));
    }

    function testUpdateSuccess() {
        $student = $this->studentRegistration()->getStudent();

        $request = new StudentUpdate($student->getId(), "rahasia", "anom.jpg", "ANOM", "777", "rumah", "smp", "disabled");
        $response = $this->studentService->update($request);
        self::assertNotNull($response->getStudent());
    }

    function testUpdateEmpty() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("All data is required");
        
        $student = $this->studentRegistration()->getStudent();
        $request = new StudentUpdate($student->getId(), "", "", "", "", "", "", "");
        $this->studentService->update($request);
    }

    function testUpdateNull() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("All data is required");
        
        $student = $this->studentRegistration()->getStudent();
        $request = new StudentUpdate($student->getId(), null, null, null, null, null, null, null);
        $this->studentService->update($request);
    }

    function testUpdateDuplicatePhone() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Number phone is already used");

        $request = new StudentRegistration("bangkit.jpg", "BAS", "777", "jalan", "smk");
        $this->studentService->register($request, 2024, 1);
        
        $student = $this->studentRegistration()->getStudent();
        $request = new StudentUpdate($student->getId(), "rahasia", "anom.jpg", "ANOM", "777", "rumah", "smp", "disabled");
        $this->studentService->update($request);
    }

    function testLoginSuccess() {
        $student = $this->studentRegistration()->getStudent();

        $request = new StudentLogin($student->getId(), $student->getPassword());
        $response = $this->studentService->login($request);
        self::assertNotNull($response);
    }

    function testLoginEmpty() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Id and password is required");

        $request = new StudentLogin(" ", " ");
        $this->studentService->login($request);
    }

    function testLoginNull() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Id and password is required");

        $request = new StudentLogin(null, null);
        $this->studentService->login($request);
    }

    function testLoginWrongID() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Id or password is wrong");

        $student = $this->studentRegistration()->getStudent();

        $request = new StudentLogin("wrong", $student->getPassword());
        $this->studentService->login($request);
    }

    function testLoginWrongPassword() {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Id or password is wrong");

        $student = $this->studentRegistration()->getStudent();

        $request = new StudentLogin($student->getId(), "wrong");
        $this->studentService->login($request);
    }

    function testLoginAfterUpdatePassword() {
        $student = $this->studentRegistration()->getStudent();

        $request = new StudentUpdate($student->getId(), "rahasia", $student->getPhoto(), $student->getFullname(), $student->getPhone(), $student->getAddress(), $student->getSchool(), $student->getStatus());
        $this->studentService->update($request);

        $login = new StudentLogin($student->getId(), "rahasia");
        $response = $this->studentService->login($login);
        self::assertNotNull($response->getStudent());
    }

}
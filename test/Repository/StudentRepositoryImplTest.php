<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\Entity\Student;
use PHPUnit\Framework\TestCase;

class StudentRepositoryimplTest extends TestCase {

    private StudentRepository $studentRepository;

    protected function setUp(): void
    {
        $this->studentRepository = new StudentRepositoryImpl(Database::getConnection("test"));
        $this->studentRepository->deleteAll();
    }

    private function addStudent() : Student {
        $student = $this->studentRepository->add(
            new Student("student-01", "rahasia", "bangkit.jpg", "BAS", "089", "jalan", "smk", "enabled")
        );
        return $student;
    }

    public function testAddSuccess() {
        $student = $this->addStudent();
        self::assertEquals("student-01", $student->getId());
    }

    public function testGetByIDSuccess() {
        $this->addStudent();
        $student = $this->studentRepository->getByID("student-01");
        self::assertEquals("student-01", $student->getId());
    }

    public function testGetByIDNotFound() {
        $student = $this->studentRepository->getByID("student-02");
        self::assertEquals(null, $student);
    }

    public function testGetByName() {
        $this->addStudent();
        $student = $this->studentRepository->getByName("BAS");
        self::assertEquals("BAS", $student->getFullname());
    }

    public function testGetByNameNotFound() {
        $student = $this->studentRepository->getByName("BASD");
        self::assertEquals(null, $student);
    }

    public function testGetByPhone() {
        $this->addStudent();
        $student = $this->studentRepository->getByPhone("089");
        self::assertEquals("BAS", $student->getFullname());
    }

    public function testGetByPhoneNotFound() {
        $student = $this->studentRepository->getByPhone("BASD");
        self::assertEquals(null, $student);
    }

    public function testGetAll() {
        $this->addStudent();
        $students = $this->studentRepository->getAll();
        self::assertEquals(1, sizeof($students));
    }

    public function testGettAllEmpty() {
        $students = $this->studentRepository->getAll();
        self::assertEquals(0, sizeof($students));
    }

    public function testUpdateSuccess() {
        $student = $this->addStudent();
        $student->setFullname("Bangkit");
        $student->setStatus("disabled");
        $newStudent = $this->studentRepository->update($student);

        self::assertEquals("Bangkit", $newStudent->getFullname());
        self::assertEquals("disabled", $newStudent->getStatus());
    }

}
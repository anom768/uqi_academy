<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\Entity\Batch;
use com\bangkitanomsedhayu\uqi\academy\Entity\Student;
use PHPUnit\Framework\TestCase;

class BatchRepositoryImplTest extends TestCase {

    private StudentRepository $studentRepository;
    private BatchRepository $batchRepository;
    private SessionRepository $sessionRepository;

    function setUp(): void
    {
        $connection = Database::getConnection();
        $this->studentRepository = new StudentRepositoryImpl($connection);
        $this->batchRepository = new BatchRepositoryImpl($connection);
        $this->sessionRepository = new SessionRepositoryImpl($connection);

        $this->sessionRepository->deleteAll();
        $this->batchRepository->deleteAll();
        $this->studentRepository->deleteAll();
    }

    private function addStudent() : Student {
        $student = $this->studentRepository->add(
            new Student("student-01", "rahasia", "rahasia", "bangkit.jpg", "BAS", "089", "jalan", "smk", "enabled")
        );
        return $student;
    }

    private function addbatch(string $id_student) :Batch {
        $batch = $this->batchRepository->add(
            new Batch(0, $id_student, "", 2024, 2)
        );
        return $batch;
    }

    function testAddSuccess() {
        $student = $this->addStudent();
        $batch = $this->addbatch($student->getId());
        
        self::assertEquals($student->getId(), $batch->getIdStudent());
    }

    function testGetByIDStudent() {
        $student = $this->addStudent();
        $this->addbatch($student->getId());

        $batch = $this->batchRepository->getByIDStudent($student->getId());
        self::assertEquals($student->getId(), $batch->getIdStudent());
    }

    function testGetByIDStudentNotFound() {
        self::assertNull($this->batchRepository->getByIDStudent("null"));
    }

    function testGetBybatch() {
        $student = $this->addStudent();
        $this->addbatch($student->getId());

        $batchs = $this->batchRepository->getByBatch(2024, 2);
        self::assertEquals(1, sizeof($batchs));
    }

    function testGetByBatchNotFound() {
        self::assertEquals(0, sizeof($this->batchRepository->getByBatch(2024, 2)));
    }

    function testGetAll() {
        $student = $this->addStudent();
        $this->addbatch($student->getId());

        $batchs = $this->batchRepository->getAll();
        self::assertEquals(1, sizeof($batchs));
    }

    function testGetAllNotFound() {
        $batchs = $this->batchRepository->getAll();
        self::assertEquals(0, sizeof($batchs));
    }

    function testUpdate() {
        $student = $this->addStudent();
        $batch = $this->addbatch($student->getId());

        $batch->setYear(2023);
        $newBatch = $this->batchRepository->update($batch);
        self::assertEquals(2023, $newBatch->getYear());
    }

}
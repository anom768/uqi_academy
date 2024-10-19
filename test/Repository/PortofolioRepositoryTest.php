<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\Entity\Portofolio;
use com\bangkitanomsedhayu\uqi\academy\Entity\Student;
use PHPUnit\Framework\TestCase;

class PortofolioRepositoryTest extends TestCase {

    private StudentRepository $studentRepository;
    private BatchRepository $batchRepository;
    private PortofolioRepository $portofolioRepository;

    function setUp(): void
    {
        $connection = Database::getConnection();
        $this->studentRepository = new StudentRepositoryImpl($connection);
        $this->batchRepository = new BatchRepositoryImpl($connection);
        $this->portofolioRepository = new PortofolioRepositoryImpl($connection);

        $this->portofolioRepository->deleteAll();
        $this->batchRepository->deleteAll();
        $this->studentRepository->deleteAll();
    }

    private function addStudent() : Student {
        $student = $this->studentRepository->add(
            new Student("student-01", "rahasia", "bangkit.jpg", "BAS", "089", "jalan", "smk", "enabled")
        );
        return $student;
    }

    private function addPortofolio(string $id_student) :Portofolio {
        return $this->portofolioRepository->add(
            new Portofolio(0, $id_student, "image", "satu.jpg")
        );
    }

    public function testAdd() {
        $student = $this->addStudent();
        $portofolio = $this->addPortofolio($student->getId());

        self::assertEquals(1, $portofolio->getId());
        self::assertEquals("satu.jpg", $portofolio->getPortofolioName());
    }

    public function testGetAll() {
        $student = $this->addStudent();
        $this->addPortofolio($student->getId());

        $portofolios = $this->portofolioRepository->getAll();
        self::assertEquals(1, sizeof($portofolios));
    }

    public function testGetAllEmpty() {
        $portofolios = $this->portofolioRepository->getAll();
        self::assertEquals(0, sizeof($portofolios));
    }

    public function testDeleteByID() {
        $student = $this->addStudent();
        $portofolio = $this->addPortofolio($student->getId());

        $this->portofolioRepository->deleteByID($portofolio->getId());

        self::assertEquals(0, sizeof($this->portofolioRepository->getAll()));
    }

}
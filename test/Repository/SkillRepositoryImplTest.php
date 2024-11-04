<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\Entity\Skill;
use com\bangkitanomsedhayu\uqi\academy\Entity\Student;
use PHPUnit\Framework\TestCase;

class SkillRepositoryImplTest extends TestCase {

    private StudentRepository $studentRepository;
    private BatchRepository $batchRepository;
    private SessionRepository $sessionRepository;
    private SkillRepository $skillRepository;
    private SocialMediaRepository $socialMediaRepository;

    function setUp(): void
    {
        $connection = Database::getConnection();
        $this->studentRepository = new StudentRepositoryImpl($connection);
        $this->batchRepository = new BatchRepositoryImpl($connection);
        $this->sessionRepository = new SessionRepositoryImpl($connection);
        $this->skillRepository = new SkillRepositoryImpl($connection);
        $this->socialMediaRepository = new SocialMediaRepositoryImpl($connection);

        $this->socialMediaRepository->deleteAll();
        $this->skillRepository->deleteAll();
        $this->sessionRepository->deleteAll();
        $this->batchRepository->deleteAll();
        $this->studentRepository->deleteAll();
    }

    private function addStudent() : Student {
        $student = $this->studentRepository->add(
            new Student("student-01", "rahasia", "rahasia", "bangkit.jpg", "BAS", "", "", "", "", "089", "jalan", "smk", "enabled")
        );
        return $student;
    }

    private function addSkill(string $id_student) :Skill {
        $skill = $this->skillRepository->add(
            new Skill(0, $id_student, "3D Modeling", 80)
        );
        return $skill;
    }

    function testAddSuccess() {
        $student = $this->addStudent();
        $skill = $this->addSkill($student->getId());
        
        self::assertEquals($student->getId(), $skill->getIdStudent());
    }

    function testGetByIDStudent() {
        $student = $this->addStudent();
        $this->addSkill($student->getId());

        $skills = $this->skillRepository->getByIDStudent($student->getId());
        self::assertEquals(1, sizeof($skills));
    }

    function testGetByIDStudentNotFound() {
        self::assertEquals(0, sizeof($this->skillRepository->getByIDStudent("null")));
    }

    public function testDelete() {
        $student = $this->addStudent();
        $skill = $this->addSkill($student->getId());

        $this->skillRepository->delete($skill->getIdStudent(), $skill->getSkill());
        self::assertEquals(0, sizeof($this->skillRepository->getByIDStudent($student->getId())));
    }

}
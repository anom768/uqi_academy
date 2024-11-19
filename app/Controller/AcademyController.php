<?php

namespace com\bangkitanomsedhayu\uqi\academy\Controller;

use com\bangkitanomsedhayu\uqi\academy\App\View;
use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentLogin;
use com\bangkitanomsedhayu\uqi\academy\Repository\BatchRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\EducationRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\ExperienceRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\LanguageRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\PortofolioRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\SessionRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\SkillRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\SocialMediaRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentBatchRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\EducationService;
use com\bangkitanomsedhayu\uqi\academy\Service\EducationServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\ExperienceService;
use com\bangkitanomsedhayu\uqi\academy\Service\ExperienceServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\LanguageService;
use com\bangkitanomsedhayu\uqi\academy\Service\LanguageServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\PortofolioService;
use com\bangkitanomsedhayu\uqi\academy\Service\PortofolioServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\SessionService;
use com\bangkitanomsedhayu\uqi\academy\Service\SessionServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\SkillService;
use com\bangkitanomsedhayu\uqi\academy\Service\SkillServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\SocialMediaService;
use com\bangkitanomsedhayu\uqi\academy\Service\SocialMediaServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\StudentBatchService;
use com\bangkitanomsedhayu\uqi\academy\Service\StudentBatchServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\StudentService;
use com\bangkitanomsedhayu\uqi\academy\Service\StudentServiceImpl;
use Exception;

class AcademyController {

    private StudentService $studentService;
    private SocialMediaService $socialMediaService;
    private SessionService $sessionService;
    private SkillService $skillService;
    private LanguageService $languageService;
    private EducationService $educationService;
    private ExperienceService $experienceService;
    private PortofolioService $portofolioService;
    private StudentBatchService $studentBatchServcice;

    public function __construct()
    {
        $connection = Database::getConnection();
        $sessionRepository = new SessionRepositoryImpl($connection);
        $studentRepository = new StudentRepositoryImpl($connection);
        $batchRepository = new BatchRepositoryImpl($connection);
        $socialMediaRepository = new SocialMediaRepositoryImpl($connection);
        $skillRepository = new SkillRepositoryImpl($connection);
        $languageRepository = new LanguageRepositoryImpl($connection);
        $educationRepository = new EducationRepositoryImpl($connection);
        $experienceRepository = new ExperienceRepositoryImpl($connection);
        $portofolioRepository = new PortofolioRepositoryImpl($connection);
        $studentBatchRepository = new StudentBatchRepositoryImpl($connection);
        
        $this->studentBatchServcice = new StudentBatchServiceImpl($studentBatchRepository);
        $this->portofolioService = new PortofolioServiceImpl($portofolioRepository);
        $this->experienceService = new ExperienceServiceImpl($experienceRepository);
        $this->studentService = new StudentServiceImpl($studentRepository, $batchRepository);
        $this->socialMediaService = new SocialMediaServiceImpl($socialMediaRepository);
        $this->sessionService = new SessionServiceImpl($sessionRepository, $studentBatchRepository);
        $this->skillService = new SkillServiceImpl($skillRepository);
        $this->languageService = new LanguageServiceImpl($languageRepository);
        $this->educationService = new EducationServiceImpl($educationRepository);
    }

    public function getLogin() {
        $student = $this->sessionService->current();

        if ($student == null) {
            View::render("login", [
                "title" => "UQI Academy"
            ]);
        } else if ($student->getId() == "2401-001") {
            $students = $this->studentBatchServcice->getAll()->getStudentBatch();
            unset($students[0]);
            View::render("Admin/dashboard", [
                "title" => "UQI Academy | Admin Dashboard",
                "students" => $students
            ]);
        } else {
            // ke student
            $student = $this->studentBatchServcice->getByID($student->getId())->getStudentBatch();
            // var_dump($student);
            $socialMedias = $this->socialMediaService->getbyIdStudent($student->getId())->getSocialMedias();
            $skills = $this->skillService->getByIdStudent($student->getId())->getSkills();
            $languages = $this->languageService->getByIdStudent($student->getId())->getLanguages();
            $educations = $this->educationService->getByIdStudent($student->getId())->getEducations();
            $experiences = $this->experienceService->getByIdStudent($student->getId())->getExperience();
            $portofolios = $this->portofolioService->getByIdStudent($student->getId())->getPortofolio();

            View::render("Student/dashboard", [
                "title" => "UQI Academy | Student Dashboard",
                "student" => $student,
                "socialMedias" => $socialMedias,
                "skills" => $skills,
                "languages" => $languages,
                "educations" => $educations,
                "experiences" => $experiences,
                "portofolios" => $portofolios,
            ]);
        }
    }

    public function postLogin() {
        $request = new StudentLogin($_POST["id"], $_POST["password"]);
        
        try {
            $student = $this->studentBatchServcice->getByID($this->studentService->login($request)->getStudent()->getId())->getStudentBatch();
            $this->sessionService->create($student->getId());
            View::redirect("/");
        } catch (Exception $exception) {
            View::render("login", [
                "title" => "UQI Academy",
                "error" => $exception->getMessage()
            ]);
        }
    }

    public function logout()
    {
        $this->sessionService->destroy();
        View::redirect("/");
    }

}
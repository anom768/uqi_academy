<?php

namespace com\bangkitanomsedhayu\uqi\academy\Controller;

use com\bangkitanomsedhayu\uqi\academy\App\View;
use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentLogin;
use com\bangkitanomsedhayu\uqi\academy\Repository\BatchRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\EducationRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\ExperienceRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\LanguageRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\SessionRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\SkillRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\SocialMediaRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\EducationService;
use com\bangkitanomsedhayu\uqi\academy\Service\EducationServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\ExperienceService;
use com\bangkitanomsedhayu\uqi\academy\Service\ExperienceServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\LanguageService;
use com\bangkitanomsedhayu\uqi\academy\Service\LanguageServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\SessionService;
use com\bangkitanomsedhayu\uqi\academy\Service\SessionServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\SkillService;
use com\bangkitanomsedhayu\uqi\academy\Service\SkillServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\SocialMediaService;
use com\bangkitanomsedhayu\uqi\academy\Service\SocialMediaServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\StudentService;
use com\bangkitanomsedhayu\uqi\academy\Service\StudentServiceImpl;
use Exception;

class AdminController {

    private StudentService $studentService;
    private SocialMediaService $socialMediaService;
    private SessionService $sessionService;
    private SkillService $skillService;
    private LanguageService $languageService;
    private EducationService $educationService;
    private ExperienceService $experienceService;

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
        
        $this->experienceService = new ExperienceServiceImpl($experienceRepository);
        $this->studentService = new StudentServiceImpl($studentRepository, $batchRepository);
        $this->socialMediaService = new SocialMediaServiceImpl($socialMediaRepository);
        $this->sessionService = new SessionServiceImpl($sessionRepository, $studentRepository);
        $this->skillService = new SkillServiceImpl($skillRepository);
        $this->languageService = new LanguageServiceImpl($languageRepository);
        $this->educationService = new EducationServiceImpl($educationRepository);
    }

    public function getRegister() {
        View::render("Admin/registration", [
            "title" => "UQI Academy | Student Registration"
        ]);
    }

    public function postRegister() {
        // $request = new StudentRegistration($_POST[""]);
    }

    public function getProfile(string $id1, string $id2) {
        $id = $id1."-".$id2;
        $student = $this->studentService->getByID($id)->getStudent();
        $socialMedias = $this->socialMediaService->getbyIdStudent($student->getId())->getSocialMedias();
        $skills = $this->skillService->getByIdStudent($student->getId())->getSkills();
        $languages = $this->languageService->getByIdStudent($student->getId())->getLanguages();
        $educations = $this->educationService->getByIdStudent($student->getId())->getEducations();
        $experiences = $this->experienceService->getByIdStudent($student->getId())->getExperience();

        if ($student != null) {
            View::render("Student/profile", [
                "title" => "UQI Academy | Student Profile",
                "student" => $student,
                "socialMedias" => $socialMedias,
                "skills" => $skills,
                "languages" => $languages,
                "educations" => $educations,
                "experiences" => $experiences,
            ]);
        } else {
            View::redirect("/");
        }
        
    }

}
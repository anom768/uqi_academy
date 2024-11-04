<?php

namespace com\bangkitanomsedhayu\uqi\academy\Controller;

use com\bangkitanomsedhayu\uqi\academy\App\View;
use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\EducationRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\ExperienceRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\SkillRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdatePassword;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdateProfile;
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

class StudentController {

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
        }
        
    }

    public function postProfile(string $id1, string $id2) {
        $id = $id1."-".$id2;
        $student = $this->studentService->getByID($id)->getStudent();
        $socialMedias = $this->socialMediaService->getbyIdStudent($student->getId())->getSocialMedias();
        $skills = $this->skillService->getByIdStudent($student->getId())->getSkills();
        $languages = $this->languageService->getByIdStudent($student->getId())->getLanguages();
        $educations = $this->educationService->getByIdStudent($student->getId())->getEducations();
        $experiences = $this->experienceService->getByIdStudent($student->getId())->getExperience();

        $request = new StudentUpdateProfile(
            $id, $_POST["photo"], $_POST["fullname"], $_POST["specialist"],
            $_POST["email"], $_POST["bio"], $_POST["phone"], $_POST["address"], $_POST["school"]
        );

        try {
            $this->studentService->updateProfile($request);
            session_start();
            $_SESSION["success"] = "Update profile successfull";
            View::redirect("/profile"."/".$student->getId());
        } catch (Exception $exception) {
            View::render("Student/profile", [
                "title" => "UQI Academy | Student Profile",
                "student" => $student,
                "socialMedias" => $socialMedias,
                "skills" => $skills,
                "languages" => $languages,
                "educations" => $educations,
                "experiences" => $experiences,
                "error" => $exception->getMessage(),
            ]);
        }
    }

    public function postPassword(string $id1, string $id2) {
        $id = $id1."-".$id2;
        $student = $this->studentService->getByID($id)->getStudent();
        $socialMedias = $this->socialMediaService->getbyIdStudent($student->getId())->getSocialMedias();
        $skills = $this->skillService->getByIdStudent($student->getId())->getSkills();
        $languages = $this->languageService->getByIdStudent($student->getId())->getLanguages();
        $educations = $this->educationService->getByIdStudent($student->getId())->getEducations();
        $experiences = $this->experienceService->getByIdStudent($student->getId())->getExperience();

        $request = new StudentUpdatePassword($id, $_POST["password"], $_POST["confirmPassword"]);

        try {
            $this->studentService->updatePassword($request);
            session_start();
            $_SESSION["success"] = "Update password successfull";
            View::redirect("/profile" . "/" . $student->getId());
        } catch (Exception $exception) {
            View::render("Student/profile", [
                "title" => "UQI Academy | Student Profile",
                "student" => $student,
                "socialMedias" => $socialMedias,
                "skills" => $skills,
                "languages" => $languages,
                "educations" => $educations,
                "experiences" => $experiences,
                "error" => $exception->getMessage(),
            ]);
        }
    }

    public function postEducation(string $id1, string $id2) {
        $id = $id1."-".$id2;
        $student = $this->studentService->getByID($id)->getStudent();
        $socialMedias = $this->socialMediaService->getbyIdStudent($student->getId())->getSocialMedias();
        $skills = $this->skillService->getByIdStudent($student->getId())->getSkills();
        $languages = $this->languageService->getByIdStudent($student->getId())->getLanguages();
        $educations = $this->educationService->getByIdStudent($student->getId())->getEducations();
        $experiences = $this->experienceService->getByIdStudent($student->getId())->getExperience();
        
        $request = new EducationRequest($id, $_POST["school"], (int)$_POST["entryDate"], (int)$_POST["graduateDate"]);

        try {
            $this->educationService->add($request);
            session_start();
            $_SESSION["success"] = "Add education successfull";
            View::redirect("/profile" . "/" . $student->getId());
        } catch (Exception $exception) {
            View::render("Student/profile", [
                "title" => "UQI Academy | Student Profile",
                "student" => $student,
                "socialMedias" => $socialMedias,
                "skills" => $skills,
                "languages" => $languages,
                "educations" => $educations,
                "experiences" => $experiences,
                "error" => $exception->getMessage(),
            ]);
        }
    }

    public function postExperience(string $id1, string $id2) {
        $id = $id1."-".$id2;
        $student = $this->studentService->getByID($id)->getStudent();
        $socialMedias = $this->socialMediaService->getbyIdStudent($student->getId())->getSocialMedias();
        $skills = $this->skillService->getByIdStudent($student->getId())->getSkills();
        $languages = $this->languageService->getByIdStudent($student->getId())->getLanguages();
        $educations = $this->educationService->getByIdStudent($student->getId())->getEducations();
        $experiences = $this->experienceService->getByIdStudent($student->getId())->getExperience();
        
        $request = new ExperienceRequest($id, $_POST["type"], $_POST["company"], $_POST["entryDate"], $_POST["endDate"], $_POST["description"]);
        
        try {
            $this->experienceService->add($request);
            session_start();
            $_SESSION["success"] = "Add experience successfull";
            View::redirect("/profile" . "/" . $student->getId());
        } catch (Exception $exception) {
            View::render("Student/profile", [
                "title" => "UQI Academy | Student Profile",
                "student" => $student,
                "socialMedias" => $socialMedias,
                "skills" => $skills,
                "languages" => $languages,
                "educations" => $educations,
                "experiences" => $experiences,
                "error" => $exception->getMessage(),
            ]);
        }
    }

    public function postSkill(string $id1, string $id2) {
        $id = $id1."-".$id2;
        $student = $this->studentService->getByID($id)->getStudent();
        $socialMedias = $this->socialMediaService->getbyIdStudent($student->getId())->getSocialMedias();
        $skills = $this->skillService->getByIdStudent($student->getId())->getSkills();
        $languages = $this->languageService->getByIdStudent($student->getId())->getLanguages();
        $educations = $this->educationService->getByIdStudent($student->getId())->getEducations();
        $experiences = $this->experienceService->getByIdStudent($student->getId())->getExperience();
        
        $request = new SkillRequest($id, $_POST["skill"], (int)$_POST["score"]);
        
        try {
            $this->skillService->add($request);
            session_start();
            $_SESSION["success"] = "Add skill successfull";
            View::redirect("/profile" . "/" . $student->getId());
        } catch (Exception $exception) {
            View::render("Student/profile", [
                "title" => "UQI Academy | Student Profile",
                "student" => $student,
                "socialMedias" => $socialMedias,
                "skills" => $skills,
                "languages" => $languages,
                "educations" => $educations,
                "experiences" => $experiences,
                "error" => $exception->getMessage(),
            ]);
        }
    }

    public function postLanguage(string $id1, string $id2) {
        $id = $id1."-".$id2;
        $student = $this->studentService->getByID($id)->getStudent();
        $socialMedias = $this->socialMediaService->getbyIdStudent($student->getId())->getSocialMedias();
        $skills = $this->skillService->getByIdStudent($student->getId())->getSkills();
        $languages = $this->languageService->getByIdStudent($student->getId())->getLanguages();
        $educations = $this->educationService->getByIdStudent($student->getId())->getEducations();
        $experiences = $this->experienceService->getByIdStudent($student->getId())->getExperience();
        
        $request = new LanguageRequest($id, $_POST["language"], (int)$_POST["score"]);
        
        try {
            $this->languageService->add($request);
            session_start();
            $_SESSION["success"] = "Add language successfull";
            View::redirect("/profile" . "/" . $student->getId());
        } catch (Exception $exception) {
            View::render("Student/profile", [
                "title" => "UQI Academy | Student Profile",
                "student" => $student,
                "socialMedias" => $socialMedias,
                "skills" => $skills,
                "languages" => $languages,
                "educations" => $educations,
                "experiences" => $experiences,
                "error" => $exception->getMessage(),
            ]);
        }
    }

}
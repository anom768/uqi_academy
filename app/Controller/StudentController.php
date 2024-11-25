<?php

namespace com\bangkitanomsedhayu\uqi\academy\Controller;

use com\bangkitanomsedhayu\uqi\academy\App\View;
use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\EducationRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\ExperienceRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\PortofolioRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\SkillRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\SocialMediaRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdatePassword;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdateProfile;
use com\bangkitanomsedhayu\uqi\academy\Entity\SocialMedia;
use com\bangkitanomsedhayu\uqi\academy\Helper\ControllerHelper;
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

class StudentController
{

    private StudentService $studentService;
    private SocialMediaService $socialMediaService;
    private SessionService $sessionService;
    private SkillService $skillService;
    private LanguageService $languageService;
    private EducationService $educationService;
    private ExperienceService $experienceService;
    private PortofolioService $portofolioService;
    private StudentBatchService $studentBatchService;

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

        $this->studentBatchService = new StudentBatchServiceImpl($studentBatchRepository);
        $this->portofolioService = new PortofolioServiceImpl($portofolioRepository);
        $this->experienceService = new ExperienceServiceImpl($experienceRepository);
        $this->studentService = new StudentServiceImpl($studentRepository, $batchRepository);
        $this->socialMediaService = new SocialMediaServiceImpl($socialMediaRepository);
        $this->sessionService = new SessionServiceImpl($sessionRepository, $studentBatchRepository);
        $this->skillService = new SkillServiceImpl($skillRepository);
        $this->languageService = new LanguageServiceImpl($languageRepository);
        $this->educationService = new EducationServiceImpl($educationRepository);
    }

    public function getProfile(string $id1, string $id2)
    {
        $id = $id1 . "-" . $id2;
        $student = $this->studentBatchService->getByID($id)->getStudentBatch();

        if ($student != null) {
            $socialMedias = $this->socialMediaService->getbyIdStudent($student->getId())->getSocialMedias();
            $skills = $this->skillService->getByIdStudent($student->getId())->getSkills();
            $languages = $this->languageService->getByIdStudent($student->getId())->getLanguages();
            $educations = $this->educationService->getByIdStudent($student->getId())->getEducations();
            $experiences = $this->experienceService->getByIdStudent($student->getId())->getExperience();
            $portofolios = $this->portofolioService->getByIdStudent($student->getId())->getPortofolio();

            View::render("Student/profile", [
                "title" => "UQI Academy | Student Profile",
                "student" => $student,
                "socialMedias" => $socialMedias,
                "skills" => $skills,
                "languages" => $languages,
                "educations" => $educations,
                "experiences" => $experiences,
                "portofolios" => $portofolios
            ]);
        } else {
            View::redirect("/");
        }
    }

    public function postProfile(string $id1, string $id2)
    {
        $id = $id1."-".$id2;
        $fileName = ControllerHelper::saveImageProfile($_POST["currentimage"], "img/uqi/academy/2024/1/".$id."/", $_FILES["photo"] );
        $student = $this->studentBatchService->getByID($id)->getStudentBatch();    
        $socialMedias = $this->socialMediaService->getbyIdStudent($student->getId())->getSocialMedias();
        $skills = $this->skillService->getByIdStudent($student->getId())->getSkills();
        $languages = $this->languageService->getByIdStudent($student->getId())->getLanguages();
        $educations = $this->educationService->getByIdStudent($student->getId())->getEducations();
        $experiences = $this->experienceService->getByIdStudent($student->getId())->getExperience();
        $portofolios = $this->portofolioService->getByIdStudent($student->getId())->getPortofolio();

        $request = new StudentUpdateProfile(
            $id, $fileName, $_POST["fullname"], $_POST["specialist"],
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
                "portofolios" => $portofolios,
                "error" => $exception->getMessage(),
            ]);
        }
    }

    public function postPassword(string $id1, string $id2)
    {
        $id = $id1 . "-" . $id2;
        $student = $this->studentBatchService->getByID($id)->getStudentBatch();
        $socialMedias = $this->socialMediaService->getbyIdStudent($student->getId())->getSocialMedias();
        $skills = $this->skillService->getByIdStudent($student->getId())->getSkills();
        $languages = $this->languageService->getByIdStudent($student->getId())->getLanguages();
        $educations = $this->educationService->getByIdStudent($student->getId())->getEducations();
        $experiences = $this->experienceService->getByIdStudent($student->getId())->getExperience();
        $portofolios = $this->portofolioService->getByIdStudent($student->getId())->getPortofolio();

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
                "portofolios" => $portofolios,
                "error" => $exception->getMessage(),
            ]);
        }
    }

    public function postEducation(string $id1, string $id2)
    {
        $id = $id1 . "-" . $id2;
        $this->addFunction(
            new EducationRequest($id, $_POST["type"], $_POST["school"], (int)$_POST["entryYear"], (int)$_POST["graduateYear"], $_POST["address"], $_POST["description"]),
            "Add education successfull", $this->educationService
        );
    }

    public function postExperience(string $id1, string $id2)
    {
        $id = $id1 . "-" . $id2;
        $this->addFunction(
            new ExperienceRequest($id, $_POST["type"], $_POST["company"], $_POST["entryDate"], $_POST["endDate"], $_POST["address"], $_POST["website"], $_POST["description"]),
            "Add experience successfull", $this->experienceService
        );
    }

    public function postSkill(string $id1, string $id2)
    {
        $id = $id1 . "-" . $id2;
        $this->addFunction(
            new SkillRequest($id, $_POST["skill"], (int)$_POST["score"]),
            "Add skill successfull", $this->skillService
        );
    }

    public function postLanguage(string $id1, string $id2)
    {
        $id = $id1 . "-" . $id2;
        $this->addFunction(
            new LanguageRequest($id, $_POST["language"], (int)$_POST["score"]),
            "Add language successfull", $this->languageService
        );
    }

    public function postSocialMedia(string $id1, string $id2)
    {
        $id = $id1 . "-" . $id2;
        $this->addFunction(
            new SocialMediaRequest($id, $_POST["platform"], $_POST["url"]),
            "Add social media successfull", $this->socialMediaService
        );
    }

    public function postPortofolio(string $id1, string $id2)
    {
        $id = $id1 . "-" . $id2;
        $uniqId = uniqid() . "_";
        $type = ControllerHelper::saveImagePortofolio("img/uqi/academy/2024/1/".$id."/portofolio/", $uniqId, $_FILES["portofolio"]);
        $this->addFunction(
            new PortofolioRequest($uniqId, $id, $type, basename($_FILES["portofolio"]["name"])),
            "Add portofolio successfull", $this->portofolioService
        );
    }

    public function deleteSkill(int $id) {
        $this->deleteFunction($id, "Delete skill successfull", $this->skillService);
    }

    public function deleteLanguage(int $id) {
        $this->deleteFunction($id, "Delete language successfull", $this->languageService);
    }

    public function deleteSocialMedia(int $id) {
        $this->deleteFunction($id, "Delete social media successfull", $this->socialMediaService);
    }

    public function deletePortofolio(string $id) {
        $this->deleteFunction($id, "Delete portofolio successfull", $this->portofolioService);
    }

    private function addFunction($request, string $success, $service) {
        $student = $this->sessionService->current();
        $socialMedias = $this->socialMediaService->getbyIdStudent($student->getId())->getSocialMedias();
        $skills = $this->skillService->getByIdStudent($student->getId())->getSkills();
        $languages = $this->languageService->getByIdStudent($student->getId())->getLanguages();
        $educations = $this->educationService->getByIdStudent($student->getId())->getEducations();
        $experiences = $this->experienceService->getByIdStudent($student->getId())->getExperience();
        $portofolios = $this->portofolioService->getByIdStudent($student->getId())->getPortofolio();

        try {
            $service->add($request);
            session_start();
            $_SESSION["success"] = $success;
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
                "portofolios" => $portofolios,
                "error" => $exception->getMessage(),
            ]);
        }
    }

    private function deleteFunction($id, string $success, $service) {
        $student = $this->sessionService->current();
        $studentBatch = $this->studentBatchService->getByID($student->getId())->getStudentBatch();
        $socialMedias = $this->socialMediaService->getbyIdStudent($student->getId())->getSocialMedias();
        $skills = $this->skillService->getByIdStudent($student->getId())->getSkills();
        $languages = $this->languageService->getByIdStudent($student->getId())->getLanguages();
        $educations = $this->educationService->getByIdStudent($student->getId())->getEducations();
        $experiences = $this->experienceService->getByIdStudent($student->getId())->getExperience();
        $portofolios = $this->portofolioService->getByIdStudent($student->getId())->getPortofolio();

        try {
            if ($service instanceof PortofolioServiceImpl) {
                $targetDir = "img/uqi/academy/" . $studentBatch->getYear() . "/" . $studentBatch->getBatch() . "/" . $studentBatch->getId() . "/portofolio/";
                ControllerHelper::deletePortofolio($targetDir, $id);
            }
            $service->delete($id);
            session_start();
            $_SESSION["success"] = $success;
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
                "portofolios" => $portofolios,
                "error" => $exception->getMessage(),
            ]);
        }
    }
}

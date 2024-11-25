<?php

namespace com\bangkitanomsedhayu\uqi\academy\Helper;

use com\bangkitanomsedhayu\uqi\academy\DTO\EducationRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\EducationUpdateRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\ExperienceRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\ExperienceUpdateRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageUpdateRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\PortofolioRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\SkillRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\SkillUpdateRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\SocialMediaRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\SocialMediaUpdate;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentLogin;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentRegistration;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdate;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdatePassword;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdateProfile;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepository;
use Exception;

class ServiceHelper {

    public static function studentRegistrationCheck(StudentRegistration $request, StudentRepository $studentRepository) {
        if (trim($request->getPhoto()) == "" || trim($request->getFullname()) == "" || trim($request->getPhone()) == "" ||
            trim($request->getAddress()) == "" || trim($request->getSchool()) == "" || $request->getPhoto() == null ||
            $request->getFullname() == null || $request->getPhone() == null || $request->getAddress() == null || $request->getSchool() == null) {
                throw new Exception("All data is required");
        }

        $student = $studentRepository->getByPhone($request->getPhone());
        if ($student != null) {
            throw new Exception("Number phone is already used");
        }
    }

    public static function studentLoginCheck(StudentLogin $request) {
        if (trim($request->getId()) == "" || trim($request->getPassword()) == "" ||
            $request->getId() == null || $request->getPassword() == null) {
                throw new Exception("Id and password is required");
        }
    }

    public static function passwordCheck(string $password, string $hashPassword) :bool {
        return password_verify($password, $hashPassword);
    }

    public static function studentUpdateCheck(StudentUpdate $request, StudentRepository $studentRepository) {
        if (trim($request->getPassword()) == "" || trim($request->getPhoto()) == "" || trim($request->getFullname()) == "" || trim($request->getPhone()) == "" ||
            trim($request->getAddress()) == "" || trim($request->getSchool()) == "" || $request->getPhoto() == null || $request->getPassword() == null ||
            $request->getFullname() == null || $request->getPhone() == null || $request->getAddress() == null || $request->getSchool() == null) {
                throw new Exception("All data is required");
        }

        self::phoneDuplicateCheck($request->getId(), $request->getPhone(), $studentRepository);

        self::emailDuplicateCheck($request->getId(), $request->getEmail(), $studentRepository);
    }

    public static function generateIDStudent(int $year, int $batch, StudentRepository $studentRepository) :string {
        // OUTPUT = 2402-001
        $totalStudents = count($studentRepository->getAll()) + 1;
        return sprintf("%d%02d-%03d", $year % 100, $batch, $totalStudents);
    }

    public static function generateRandomPassword(int $length = 10): string {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomPassword = '';
        
        for ($i = 0; $i < $length; $i++) {
            $randomPassword .= $characters[rand(0, $charactersLength - 1)];
        }
        
        return $randomPassword;
    }

    public static function hashPassword(string $password): string {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function skillAddCheck(SkillRequest $request) {
        if (trim($request->getSkill()) == "" || $request->getSkill() == null) {
            throw new Exception("Skill name is required");
        }

        if ($request->getScore() < 0 || $request->getScore() > 10) {
            throw new Exception("Score must between 0 to 10");
        }
    }

    public static function skillUpdateCheck(SkillUpdateRequest $request) {
        if (trim($request->getSkill()) == "" || $request->getSkill() == null) {
            throw new Exception("Skill name is required");
        }

        if ($request->getScore() < 0 || $request->getScore() > 10) {
            throw new Exception("Score must between 0 to 10");
        }
    }

    public static function languageAddCheck(LanguageRequest $request) {
        if (trim($request->getLanguage()) == "" || $request->getLanguage() == null) {
            throw new Exception("Language name is required");
        }

        if ($request->getScore() < 0 || $request->getScore() > 10) {
            throw new Exception("Score must between 0 to 10");
        }
    }

    public static function languageUpdateCheck(LanguageUpdateRequest $request) {
        if (trim($request->getLanguage()) == "" || $request->getLanguage() == null) {
            throw new Exception("Language name is required");
        }

        if ($request->getScore() < 0 || $request->getScore() > 10) {
            throw new Exception("Score must between 0 to 10");
        }
    }

    public static function educationAddCheck(EducationRequest $request) {
        if (trim($request->getSchool()) == "" || $request->getSchool() == null ||
            trim($request->getEntryYear()) == "" || $request->getEntryYear() == null ||
            trim($request->getGraduateYear()) == "" || $request->getGraduateYear() == null ||
            trim($request->getType()) == "" || trim($request->getAddress()) == "" || $request->getAddress() == null) {
            throw new Exception("All data is required");
        }

        if (strlen($request->getEntryYear()) < 4 || strlen($request->getEntryYear()) > 4 ||
            strlen($request->getGraduateYear()) < 4 || strlen($request->getGraduateYear()) > 4 ||
            $request->getEntryYear() < 2000 || $request->getGraduateYear() < 2000 ||
            $request->getEntryYear() > date("Y") || $request->getEntryYear() >= $request->getGraduateYear()) {
                throw new Exception("Entry date or graduate date is invalid");
        }
    }

    public static function educationUpdateCheck(EducationUpdateRequest $request) {
        if (trim($request->getSchool()) == "" || $request->getSchool() == null ||
            trim($request->getEntryYear()) == "" || $request->getEntryYear() == null ||
            trim($request->getGraduateYear()) == "" || $request->getGraduateYear() == null ||
            trim($request->getType()) == "" || trim($request->getAddress()) == "" || $request->getAddress() == null) {
            throw new Exception("All data is required");
        }

        if (strlen($request->getEntryYear()) < 4 || strlen($request->getEntryYear()) > 4 ||
            strlen($request->getGraduateYear()) < 4 || strlen($request->getGraduateYear()) > 4 ||
            $request->getEntryYear() < 2000 || $request->getGraduateYear() < 2000 ||
            $request->getEntryYear() > date("Y") || $request->getEntryYear() >= $request->getGraduateYear()) {
                throw new Exception("Entry date or graduate date is invalid");
        }
    }

    public static function experienceAddCheck(ExperienceRequest $request) {
        if (trim($request->getCompany()) == "" || $request->getCompany() == null ||
            trim($request->getType()) == "" || $request->getType() == null ||
            trim($request->getEntryDate()) == "" || $request->getEntryDate() == null ||
            trim($request->getEndDate()) == "" || $request->getEndDate() == null ||
            trim($request->getAddress()) == "" || $request->getAddress() == null) {
            throw new Exception("All data is required");
        }

    }

    public static function experienceUpdateCheck(ExperienceUpdateRequest $request) {
        if (trim($request->getCompany()) == "" || $request->getCompany() == null ||
            trim($request->getType()) == "" || $request->getType() == null ||
            trim($request->getEntryDate()) == "" || $request->getEntryDate() == null ||
            trim($request->getEndDate()) == "" || $request->getEndDate() == null ||
            trim($request->getAddress()) == "" || $request->getAddress() == null) {
            throw new Exception("All data is required");
        }

    }

    public static function updateProfileCheck(StudentUpdateProfile $request, StudentRepository $studentRepository) {
        if (trim($request->getFullname()) == "" || trim($request->getSpecialist()) == "" || trim($request->getEmail()) == "" ||
            trim($request->getBio()) == "" || trim($request->getPhone()) == "" || trim($request->getAddress()) == "" || 
            trim($request->getSchool()) == "" || $request->getFullname() == null || $request->getSpecialist() == null ||
            $request->getEmail() == null || $request->getBio() == null || $request->getPhone() == null || $request->getAddress() == null ||
            $request->getSchool() == null) {
                throw new Exception("All data is required");
        }

        self::phoneDuplicateCheck($request->getId(), $request->getPhone(), $studentRepository);

        self::emailDuplicateCheck($request->getId(), $request->getEmail(), $studentRepository);

    }

    public static function emailDuplicateCheck(string $id, string $email, StudentRepository $studentRepository) {
        $student = $studentRepository->getByEmail($email);
        if ($student != null && $student->getId() != $id) {
            throw new Exception("Email is already used");
        }
    }

    public static function phoneDuplicateCheck(string $id, string $phone, StudentRepository $studentRepository) {
        $student = $studentRepository->getByPhone($phone);
        if ($student != null && $student->getId() != $id) {
            throw new Exception("Phone is already used");
        }
    }

    public static function updatePasswordCheck(StudentUpdatePassword $request, StudentRepository $studentRepository) {
        if (trim($request->getPassword()) == "" || trim($request->getConfirmPassword()) == "" ||
            $request->getPassword() == null || $request->getConfirmPassword() == null) {
                throw new Exception("All data is required");
        }

        if (strlen($request->getPassword()) < 8) {
            throw new Exception("password must have minimum 8 characters");
        }

        if ($request->getPassword() != $request->getConfirmPassword()) {
            throw new Exception("password and confirm password must same");
        }
    }

    public static function portofolioAddCheck(PortofolioRequest $request) {
        if (trim($request->getPortofolio()) == "" || $request->getPortofolio() == null) {
            throw new Exception("Portofolio link is required");
        }
        
    }

    public static function socialMediaAddCheck(SocialMediaRequest $request) {
        if (trim($request->getPlatform()) == "" || $request->getPlatform() == null ||
            trim($request->getUrl()) == "" || $request->getUrl() == null) {
                throw new Exception("All data is required");
        }
    }

    public static function socialMediaUpdateCheck(SocialMediaUpdate $request) {
        if (trim($request->getPlatform()) == "" || $request->getPlatform() == null ||
            trim($request->getUrl()) == "" || $request->getUrl() == null) {
                throw new Exception("All data is required");
        }
    }

}
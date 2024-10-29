<?php

namespace com\bangkitanomsedhayu\uqi\academy\Helper;

use com\bangkitanomsedhayu\uqi\academy\DTO\EducationRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\ExperienceRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\LanguageRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\SkillRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentLogin;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentRegistration;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdate;
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

        $student = $studentRepository->getByPhone($request->getPhone());
        if ($student != null && $student->getId() != $request->getId()) {
            throw new Exception("Number phone is already used");
        }

        $student = $studentRepository->getByEmail($request->getEmail());
        if ($student != null && $student->getId() != $request->getId()) {
            throw new Exception("Email is already used");
        }
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

    public static function languageAddCheck(LanguageRequest $request) {
        if (trim($request->getLanguage()) == "" || $request->getLanguage() == null) {
            throw new Exception("Language name is required");
        }

        if ($request->getScore() < 0 || $request->getScore() > 10) {
            throw new Exception("Score must between 0 to 10");
        }
    }

    public static function educationAddCheck(EducationRequest $request) {
        if (trim($request->getSchool()) == "" || $request->getSchool() == null) {
            throw new Exception("School name is required");
        }
    }

    public static function experienceAddCheck(ExperienceRequest $request) {
        if (trim($request->getCompany()) == "" || $request->getCompany() == null) {
            throw new Exception("Company name is required");
        }
    }

}
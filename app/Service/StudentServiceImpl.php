<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentLogin;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentRegistration;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdate;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdatePassword;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdateProfile;
use com\bangkitanomsedhayu\uqi\academy\Entity\Batch;
use com\bangkitanomsedhayu\uqi\academy\Entity\Student;
use com\bangkitanomsedhayu\uqi\academy\Helper\ServiceHelper;
use com\bangkitanomsedhayu\uqi\academy\Repository\BatchRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepository;
use Exception;

class StudentServiceImpl implements StudentService {
    
    private StudentRepository $studentRepository;
    private BatchRepository $batchRepository;

    public function __construct(StudentRepository $studentRepository, BatchRepository $batchRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->batchRepository = $batchRepository;
    }

    public function register(StudentRegistration $request, int $year, int $batch): StudentResponse
    {
        ServiceHelper::studentRegistrationCheck($request, $this->studentRepository);

        try {
            Database::beginTransaction();
            $id = ServiceHelper::generateIDStudent($year, $batch, $this->studentRepository);
            $password = ServiceHelper::generateRandomPassword();
            $bcryptPassword = ServiceHelper::hashPassword($password);

            $student = new Student($id, $bcryptPassword, $password, $request->getPhoto(), $request->getFullname(),
            "", "", "", "", $request->getPhone(), $request->getAddress(), $request->getSchool(), "enabled");
            $this->studentRepository->add($student);

            $batch = new Batch(0, $student->getId(), "", $year, $batch);
            $this->batchRepository->add($batch);

            $student->setPassword($password);
            $studentResponse = new StudentResponse($student);
            
            Database::commitTransaction();
            return $studentResponse;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function login(StudentLogin $request): StudentResponse
    {
        ServiceHelper::studentLoginCheck($request);
        
        $student = $this->studentRepository->getByID($request->getId());
        if ($student == null || !ServiceHelper::passwordCheck($request->getPassword(), $student->getPassword())) {
            throw new Exception("Id or password is wrong");
        }

        return new StudentResponse($student);
    }

    public function getByID(string $id): StudentResponse
    {
        return new StudentResponse($this->studentRepository->getById($id));
    }

    public function getByName(string $name): StudentResponse
    {
        return new StudentResponse($this->studentRepository->getByName($name));
    }

    public function getByEmail(string $email): StudentResponse
    {
        return new StudentResponse($this->studentRepository->getByEmail($email));
    }

    public function getAll(): StudentArrayResponse
    {
        return new StudentArrayResponse($this->studentRepository->getAll());
    }

    public function update(StudentUpdate $request): StudentResponse
    {
        ServiceHelper::studentUpdateCheck($request, $this->studentRepository);

        try {
            Database::beginTransaction();
            $password = ServiceHelper::hashPassword($request->getPassword());
            $student = new Student($request->getId(), $password, "", $request->getPhoto(), $request->getFullname(),
                $request->getSpecialist(), $request->getEmail(), "", $request->getBio(), $request->getPhone(), $request->getAddress(), $request->getSchool(), $request->getStatus());
            $this->studentRepository->update($student);
            Database::commitTransaction();
            return new StudentResponse($student);
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function updateProfile(StudentUpdateProfile $request): StudentResponse
    {
        try {
            Database::beginTransaction();
            ServiceHelper::updateProfileCheck($request, $this->studentRepository);
            $newStudent = new Student($request->getId(), "", "", $request->getPhoto(), $request->getFullname(), $request->getSpecialist(),
                $request->getEmail(), "", $request->getBio(), $request->getPhone(), $request->getAddress(), $request->getSchool(), "");
            $student = $this->studentRepository->updateProfile($newStudent);
            $response = new StudentResponse($student);
            Database::commitTransaction();
            return $response;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    public function updatePassword(StudentUpdatePassword $request) : StudentResponse {
        ServiceHelper::updatePasswordCheck($request, $this->studentRepository);

        try {
            Database::beginTransaction();
            $password = ServiceHelper::hashPassword($request->getPassword());
            $student = $this->studentRepository->updatePassword($request->getId(), $password);
            $response = new StudentResponse($student);
            Database::commitTransaction();
            return $response;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

}
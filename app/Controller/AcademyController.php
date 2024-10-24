<?php

namespace com\bangkitanomsedhayu\uqi\academy\Controller;

use com\bangkitanomsedhayu\uqi\academy\App\View;
use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentLogin;
use com\bangkitanomsedhayu\uqi\academy\Repository\BatchRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\SessionRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\SessionService;
use com\bangkitanomsedhayu\uqi\academy\Service\SessionServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\StudentService;
use com\bangkitanomsedhayu\uqi\academy\Service\StudentServiceImpl;
use Exception;

class AcademyController {

    private StudentService $studentService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $sessionRepository = new SessionRepositoryImpl($connection);
        $studentRepository = new StudentRepositoryImpl($connection);
        $batchRepository = new BatchRepositoryImpl($connection);
        $this->studentService = new StudentServiceImpl($studentRepository, $batchRepository);
        $this->sessionService = new SessionServiceImpl($sessionRepository, $studentRepository);
    }

    public function getLogin() {
        $student = $this->sessionService->current();
        if ($student == null) {
            View::render("login", [
                "title" => "UQI Academy"
            ]);
        } else if ($student->getId() == "2401-001") {
            $students = $this->studentService->getAll()->getStudent();
            unset($students[0]);
            View::render("Admin/dashboard", [
                "title" => "UQI Academy | Admin Dashboard",
                "students" => $students
            ]);
        } else {
            // ke student
        }
    }

    public function postLogin() {
        $request = new StudentLogin($_POST["id"], $_POST["password"]);
        
        try {
            $student = $this->studentService->login($request)->getStudent();
            $this->sessionService->create($student->getId());
            View::redirect("/");
        } catch (Exception $exception) {
            View::render("login", [
                "title" => "UQI Academy",
                "error" => $exception->getMessage()
            ]);
        }
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

        if ($student != null) {
            View::render("Admin/detail_profile", [
                "title" => "UQI Academy | Profile Detail",
                "student" => $student
            ]);
        } else {
            View::redirect("/");
        }
        
    }

    public function logout()
    {
        $this->sessionService->destroy();
        View::redirect("/");
    }

}
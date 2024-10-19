<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\Entity\Session;
use com\bangkitanomsedhayu\uqi\academy\Entity\Student;
use com\bangkitanomsedhayu\uqi\academy\Repository\SessionRepository;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepository;

class SessionServiceImpl implements SessionService {

    public static string $COOKIE_NAME = "SANTUN-JASA-DALAM-SERUNI";

    private SessionRepository $sessionRepository;
    private StudentRepository $studentRepository;

    public function __construct(SessionRepository $sessionRepository, StudentRepository $studentRepository)
    {
        $this->sessionRepository = $sessionRepository;
        $this->studentRepository = $studentRepository;
    }

    public function create(string $id_student): Session
    {
        $session = new Session(uniqid(), $id_student);
        $this->sessionRepository->save($session);

        setcookie(self::$COOKIE_NAME, $session->getId(), time() + (60 * 60 * 48), "/");

        return $session;
    }

    public function destroy() :void
    {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';
        $this->sessionRepository->deleteById($sessionId);

        setcookie(self::$COOKIE_NAME, '', 1, "/");
    }

    public function current(): ?Student
    {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';

        $session = $this->sessionRepository->getByID($sessionId);
        if($session == null){
            return null;
        }

        return $this->studentRepository->getByID($session->getIdStudent());
    }

}
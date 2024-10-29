<?php

namespace com\bangkitanomsedhayu\uqi\academy\Middleware;

use com\bangkitanomsedhayu\uqi\academy\App\View;
use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\Repository\SessionRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\SessionService;
use com\bangkitanomsedhayu\uqi\academy\Service\SessionServiceImpl;

class MustLoginMiddleware implements Middleware {

    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $sessionRepository = new SessionRepositoryImpl($connection);
        $studentRepository = new StudentRepositoryImpl($connection);
        $this->sessionService = new SessionServiceImpl($sessionRepository, $studentRepository);
    }

    function before(): void
    {
        $student = $this->sessionService->current();
        if ($student == null) {
            View::redirect("/");
        }
    }

}
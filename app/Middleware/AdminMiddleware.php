<?php

namespace com\bangkitanomsedhayu\uqi\academy\Middleware;

use com\bangkitanomsedhayu\uqi\academy\App\View;
use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\Repository\SessionRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Repository\StudentBatchRepositoryImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\SessionService;
use com\bangkitanomsedhayu\uqi\academy\Service\SessionServiceImpl;
use com\bangkitanomsedhayu\uqi\academy\Service\StudentBatchServiceImpl;

class AdminMiddleware implements Middleware {

    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $sessionRepository = new SessionRepositoryImpl($connection);
        $studentBatchRepository = new StudentBatchRepositoryImpl($connection);
        $this->sessionService = new SessionServiceImpl($sessionRepository, $studentBatchRepository);
    }

    function before(): void
    {
        $student = $this->sessionService->current();
        if ($student->getId() != "2401-001") {
            View::redirect("/");
        }
    }

}
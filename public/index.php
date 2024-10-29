<?php

use com\bangkitanomsedhayu\uqi\academy\App\Router;
use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\Controller\AcademyController;
use com\bangkitanomsedhayu\uqi\academy\Controller\AdminController;
use com\bangkitanomsedhayu\uqi\academy\Middleware\AdminMiddleware;
use com\bangkitanomsedhayu\uqi\academy\Middleware\MustLoginMiddleware;
use com\bangkitanomsedhayu\uqi\academy\Middleware\MustNotLoginMiddleware;
use com\bangkitanomsedhayu\uqi\academy\Middleware\StudentMiddleware;

require_once __DIR__ . "/../vendor/autoload.php";

Database::getConnection();

Router::add('GET', '/', AcademyController::class, 'getLogin', []);
Router::add('POST', '/login', AcademyController::class, 'postLogin', [MustNotLoginMiddleware::class]);
Router::add('GET', '/register', AdminController::class, 'getRegister', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('GET', '/profile/([0-9]+)-([0-9]+)', AdminController::class, 'getProfile', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('GET', '/logout', AcademyController::class, 'logout', [MustLoginMiddleware::class]);

Router::run();
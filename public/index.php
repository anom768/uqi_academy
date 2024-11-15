<?php

use com\bangkitanomsedhayu\uqi\academy\App\Router;
use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\Controller\AcademyController;
use com\bangkitanomsedhayu\uqi\academy\Controller\AdminController;
use com\bangkitanomsedhayu\uqi\academy\Controller\StudentController;
use com\bangkitanomsedhayu\uqi\academy\Middleware\AdminMiddleware;
use com\bangkitanomsedhayu\uqi\academy\Middleware\MustLoginMiddleware;
use com\bangkitanomsedhayu\uqi\academy\Middleware\MustNotLoginMiddleware;
use com\bangkitanomsedhayu\uqi\academy\Middleware\StudentMiddleware;

require_once __DIR__ . "/../vendor/autoload.php";

Database::getConnection();

Router::add('GET', '/', AcademyController::class, 'getLogin', []);
Router::add('POST', '/login', AcademyController::class, 'postLogin', [MustNotLoginMiddleware::class]);
Router::add('GET', '/register', AdminController::class, 'getRegister', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('GET', '/profile/([0-9]+)-([0-9]+)', StudentController::class, 'getProfile', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('POST', '/profile/([0-9]+)-([0-9]+)', StudentController::class, 'postProfile', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('POST', '/password/([0-9]+)-([0-9]+)', StudentController::class, 'postPassword', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('POST', '/education/([0-9]+)-([0-9]+)', StudentController::class, 'postEducation', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('GET', '/education/delete/([0-9]+)', StudentController::class, 'deleteEducation', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('POST', '/experience/([0-9]+)-([0-9]+)', StudentController::class, 'postExperience', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('GET', '/experience/delete/([0-9]+)', StudentController::class, 'deleteExperience', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('POST', '/skill/([0-9]+)-([0-9]+)', StudentController::class, 'postSkill', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('GET', '/skill/delete/([0-9]+)', StudentController::class, 'deleteSkill', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('POST', '/language/([0-9]+)-([0-9]+)', StudentController::class, 'postLanguage', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('GET', '/language/delete/([0-9]+)', StudentController::class, 'deleteLanguage', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('POST', '/portofolio/([0-9]+)-([0-9]+)', StudentController::class, 'postPortofolio', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('GET', '/logout', AcademyController::class, 'logout', [MustLoginMiddleware::class]);

Router::run();
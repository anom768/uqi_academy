<?php

use com\bangkitanomsedhayu\uqi\academy\App\Router;
use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\Controller\AcademyController;

require_once __DIR__ . "/../vendor/autoload.php";

Database::getConnection();

Router::add('GET', '/', AcademyController::class, 'getLogin', []);
Router::add('POST', '/login', AcademyController::class, 'postLogin', []);
Router::add('GET', '/register', AcademyController::class, 'getRegister', []);
Router::add('GET', '/profile/([0-9]+)-([0-9]+)', AcademyController::class, 'getProfile', []);
Router::add('GET', '/logout', AcademyController::class, 'logout', []);

Router::run();
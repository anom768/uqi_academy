<?php

use com\bangkitanomsedhayu\uqi\academy\App\Router;
use com\bangkitanomsedhayu\uqi\academy\Config\Database;
use com\bangkitanomsedhayu\uqi\academy\Controller\AcademyController;
use com\bangkitanomsedhayu\uqi\academy\Controller\AdminController;
use com\bangkitanomsedhayu\uqi\academy\Controller\GuestController;
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
Router::add('POST', '/register', AdminController::class, 'postRegister', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('GET', '/profile/([0-9]+)-([0-9]+)', StudentController::class, 'getProfile', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('POST', '/profile/([0-9]+)-([0-9]+)', StudentController::class, 'postProfile', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('POST', '/password/([0-9]+)-([0-9]+)', StudentController::class, 'postPassword', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('POST', '/education/([0-9]+)-([0-9]+)', StudentController::class, 'postEducation', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('POST', '/experience/([0-9]+)-([0-9]+)', StudentController::class, 'postExperience', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('POST', '/skill/([0-9]+)-([0-9]+)', StudentController::class, 'postSkill', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('POST', '/language/([0-9]+)-([0-9]+)', StudentController::class, 'postLanguage', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('POST', '/socialMedia/([0-9]+)-([0-9]+)', StudentController::class, 'postSocialMedia', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('POST', '/portofolio/([0-9]+)-([0-9]+)', StudentController::class, 'postPortofolio', [MustLoginMiddleware::class, StudentMiddleware::class]);
Router::add('GET', '/logout', AcademyController::class, 'logout', [MustLoginMiddleware::class]);

Router::add('GET', '/modify/profile/([0-9]+)-([0-9]+)', AdminController::class, 'getProfile', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('POST', '/modify/profile/([0-9]+)-([0-9]+)', AdminController::class, 'postProfile', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('POST', '/modify/password/([0-9]+)-([0-9]+)', AdminController::class, 'postPassword', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('POST', '/modify/education/update/([0-9]+)', AdminController::class, 'updateEducation', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('POST', '/modify/education/delete/([0-9]+)', AdminController::class, 'deleteEducation', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('POST', '/modify/experience/update/([0-9]+)', AdminController::class, 'updateExperience', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('POST', '/modify/experience/delete/([0-9]+)', AdminController::class, 'deleteExperience', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('POST', '/modify/skill/update/([0-9]+)', AdminController::class, 'updateSkill', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('POST', '/modify/skill/delete/([0-9]+)', AdminController::class, 'deleteSkill', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('POST', '/modify/language/update/([0-9]+)', AdminController::class, 'updateLanguage', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('POST', '/modify/language/delete/([0-9]+)', AdminController::class, 'deleteLanguage', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('POST', '/modify/socialMedia/update/([0-9]+)', AdminController::class, 'updateSocialMedia', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('POST', '/modify/socialMedia/delete/([0-9]+)', AdminController::class, 'deleteSocialMedia', [MustLoginMiddleware::class, AdminMiddleware::class]);
Router::add('POST', '/modify/portofolio/delete/([0-9a-zA-Z_]+)', AdminController::class, 'deletePortofolio', [MustLoginMiddleware::class, AdminMiddleware::class]);

Router::add('GET', '/public/profile/([0-9]+)-([0-9]+)', GuestController::class, 'getProfile', []);

Router::run();
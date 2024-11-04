<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\DTO\StudentArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentLogin;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentRegistration;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdate;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdatePassword;
use com\bangkitanomsedhayu\uqi\academy\DTO\StudentUpdateProfile;

interface StudentService {

    function register(StudentRegistration $request, int $year, int $batch) :StudentResponse;
    function login(StudentLogin $request) :StudentResponse;
    function getByID(string $id) :StudentResponse;
    function getByName(string $name) :StudentResponse;
    function getByEmail(string $email) :StudentResponse;
    function getAll() :StudentArrayResponse;
    function update(StudentUpdate $request) :StudentResponse;
    function updateProfile(StudentUpdateProfile $request) :StudentResponse;
    function updatePassword(StudentUpdatePassword $request) :StudentResponse;

}
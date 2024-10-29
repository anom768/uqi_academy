<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\DTO\SocialMediaArrayResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\SocialMediaRequest;
use com\bangkitanomsedhayu\uqi\academy\DTO\SocialMediaResponse;
use com\bangkitanomsedhayu\uqi\academy\DTO\SocialMediaUpdate;

interface SocialMediaService {

    function add(SocialMediaRequest $request) :SocialMediaResponse;
    function getbyIdStudent(string $id_student) :SocialMediaArrayResponse;
    function getAll() :SocialMediaArrayResponse;
    function update(SocialMediaUpdate $request) :SocialMediaResponse;

}
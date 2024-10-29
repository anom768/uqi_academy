<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\SocialMedia;

interface SocialMediaRepository {
    function add(SocialMedia $socialMedia) :SocialMedia;
    function getByIDStudent(string $id_student) :array;
    function getAll() :array;
    function update(SocialMedia $newSocialMedia) :SocialMedia;
    function deleteAll() :void;
}
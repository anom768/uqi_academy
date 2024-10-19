<?php

namespace com\bangkitanomsedhayu\uqi\academy\Repository;

use com\bangkitanomsedhayu\uqi\academy\Entity\Session;

interface SessionRepository {
    
    function save(Session $session) :Session;
    function getByID(string $id) :?Session;
    function deleteByID(string $id) :void;
    function deleteAll(): void;

}
<?php

namespace com\bangkitanomsedhayu\uqi\academy\Service;

use com\bangkitanomsedhayu\uqi\academy\Entity\Session;
use com\bangkitanomsedhayu\uqi\academy\Entity\Student;

interface SessionService {

    function create(string $id_student) : Session;
    function destroy() :void;
    function current() : ?Student;

}
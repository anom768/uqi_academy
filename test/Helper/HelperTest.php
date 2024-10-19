<?php

namespace com\bangkitanomsedhayu\uqi\academy\App{

    function header(string $value){
        echo $value;
    }

}

namespace com\bangkitanomsedhayu\uqi\academy\Service {
    function setcookie(string $name, string $value){
        echo "$name: $value";
    }
}
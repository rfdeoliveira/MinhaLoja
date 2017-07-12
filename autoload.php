<?php

spl_autoload_register(function($class) {
    $classPath = sprintf("class/%s.php", $class);
    require_once($classPath);
});

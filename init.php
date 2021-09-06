<?php
//Libiary/DB
spl_autoload_register(function ($className) {
    $class = str_replace("\\", '/', $className); //Libiary/DB.php
    require $class . '.php';
});

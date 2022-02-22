<?php

spl_autoload_register();

function myAutoLoader($className){
    $path = "classes/";
    $extension = "Class.php";
    $fullPath = $path . $className . $extension;
    include_once $fullPath;
}
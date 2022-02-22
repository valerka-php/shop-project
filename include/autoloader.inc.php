<?php

function myAutoLoader($className){
    $path = "classes/";
    $extension = "Class.php";
    $fullPath = $path . $className . $extension;
    echo $fullPath;
    include_once $fullPath;
}

spl_autoload_register('myAutoLoader');
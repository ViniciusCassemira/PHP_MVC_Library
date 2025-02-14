<?php

spl_autoload_register(function($class){
    $classeController = 'Controller/' . $class . '.php';
    $classeModel = 'Model/' . $class . '.php';
    $classeDAO = 'DAO/' . $class . '.php';

    if(file_exists($classeController)){
        include $classeController;
    }else if(file_exists($classeModel)){
        include $classeModel;
    }else if(file_exists($classeDAO)){
        include $classeDAO;
    }
});
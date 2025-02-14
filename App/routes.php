<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);    

switch($url){
    case '/':
        include "./View/dashboard.php";
    break;

    case '/book':
        BookController::start();
    break;

    case '/book/manager':
        BookController::manager();
    break;
        
    case '/book/register';
        BookController::register();
    break;

    case '/book/remove';
        BookController::remove();
    break;

    case '/book/situation';
    BookController::changeSituation();
    break;
    
    case '/book/update';
        BookController::update();
    break;

    case '/gender';
        GenderController::start();
    break;

    case '/gender/register';
        GenderController::register();
    break;
    
    case '/gender/remove';
        GenderController::remove();
    break;

    case '/logout':
        UserController::logout();
    break;

    case '/booking':
        BookingController::start();
    break;

    case '/booking/return':
        BookingController::return();
    break;
    
    case '/booking/register':
        BookingController::register();
    break;
    
    case '/user/register':
        UserController::register();
    break;
    
    case '/user/login':
        UserController::login();
    break;
    
    case '/user':
        UserController::manager();
    break;

    case '/user/manager/situation':
        UserController::changeStatus();
    break;
    
    case '/user/manager/position':
        UserController::ChangeRole();
    break;

    
    default:
        include "View/error404.php";
    break;
}
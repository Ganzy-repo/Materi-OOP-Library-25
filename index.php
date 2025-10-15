<?php

require 'controllers/AuthController.php';
require 'controllers/HomeController.php';
require 'controllers/BookController.php';

$server = $_SERVER["REQUEST_URI"];


if ($server == "/") {
    return HomeController::index();
}

if ($server == "/dashboard") {
    return HomeController::home();
}

if ($server == "/logout") {
    return AuthController::destroy();
}

if ($server == "/book") {
    return BookController::index();
}

// if ($server == "/create-book") {
//     $method = $_SERVER["REQUEST_METHOD"];

//     if ($method == "GET") {
//         return BookController::create();
//     }

//     if ($method == "POST") {
//         return BookController::store();
//     }
// }

// Tambahkan route ini setelah route /create-book
if ($server == "/store-book" && $_SERVER["REQUEST_METHOD"] == "POST") {
    return BookController::store();
}

if ($server == "/create-book") {

    $method = $_SERVER["REQUEST_METHOD"];

    if ($method == "GET") {

        return BookController::create();
    }

    return BookController::store();
}

if ($server == "/create-member") {

    $method = $_SERVER["REQUEST_METHOD"];

    if ($method == "GET") {

        return AuthController::register();
    }

    return AuthController::store();
}

if ($server == "/auth") {

    $method = $_SERVER["REQUEST_METHOD"];

    if ($method == "GET") {
        return AuthController::index();
    }

    return AuthController::auth();
}

return require "Views/notFoundPage.php";

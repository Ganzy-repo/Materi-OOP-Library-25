<?php 
require "./controller/HomeController.php";
require "./controller/AuthController.php";
require "./controller/BookController.php";
require "./controller/BorrowController.php";
require "./controller/MembershipController.php";

$server = $_SERVER['REQUEST_URI'];

if ($server == "/") {
    return HomeController::index();
}
if ($server == "/auth") {
    $method = $_SERVER["REQUEST_METHOD"];
    if($method == "GET") {
        return AuthController::index();
    }
        return AuthController::store();
}

if ($server == "/book") {
    return BookController::index();
}

if ($server == "/membership") {
    return MembershipController::index();
}

if ($server == "/borrow") {
    return BorrowController::index();
}

if ($server == "/dashboard") {
    return HomeController::home();
}
<?php 
require "./Controllers/HomeController.php";
require "./Controllers/AuthController.php";
require "./Controllers/BookController.php";
require "./Controllers/BorrowController.php";
require "./Controllers/MembershipController.php";

$server = $_SERVER['REQUEST_URI'];

if ($server == "/") {
    return HomeController::index();
}
if ($server == "/auth") {
    $method = $_SERVER["REQUEST_METHOD"];
    if($method == "GET") {
        return AuthController::index();
    }
        return AuthController::auth();
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
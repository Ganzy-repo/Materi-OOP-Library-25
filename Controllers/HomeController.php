<?php

require_once("Controller.php");

class HomeController extends Controller
{
    static function index()
    {
        return self::view("Views/Home.php");
    }

    static function home()
    {

        $datalogin = $_SESSION["is_login"];
        $id = $_SESSION["id"];
        $full_name = $_SESSION["full_name"];
        $email = $_SESSION["email"];
        $phone = $_SESSION["phone"];
        $role_name = $_SESSION["role_name"];

        if (
            isset($datalogin) ||
            isset($id) ||
            isset($full_name) ||
            isset($email) ||
            isset($phone) ||
            isset($role_name)
        ) {
            return self::view("Views/Admin/Dashboard.php");
        }


        header("Location: http://localhost:8000/auth");
    }
}

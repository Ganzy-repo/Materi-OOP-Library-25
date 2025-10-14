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
        session_start();

        $datalogin = $_SESSION["is_login"] ?? NULL;
        $id = $_SESSION["id"] ?? NULL;
        $full_name = $_SESSION["full_name"] ?? NULL;
        $email = $_SESSION["email"] ?? NULL;
        $phone = $_SESSION["phone"] ?? NULL;
        $role_name = $_SESSION["role_name"] ?? NULL;

        if (
            isset($datalogin) &&
            isset($id) &&
            isset($full_name) &&
            isset($email) &&
            isset($phone) &&
            isset($role)
        ) {
            $full_name = $_SESSION['full_name'];
            $role_name = $_SESSION['role_name'];


            return self::view(
                "Views/Admin/Dashboard.php",
                ['full_name' => $full_name, 'role_name' => $role]
            );
        }


        header(
            "Location: http://localhost:8000/auth"
        );
    }
}

<?php

require_once("Controller.php");
require_once("Models/Users.php");
require_once("Models/Role.php");

class AuthController extends Controller
{
    static function index()
    {
        session_start();
        $dataLogin = $_SESSION["is_login"] ?? NULL;
        $id = $_SESSION["id"] ?? NULL;
        $full_name = $_SESSION["full_name"] ?? NULL;
        $email = $_SESSION["email"] ?? NULL;
        $role = $_SESSION["role"] ?? NULL;
        $phone = $_SESSION["phone"] ?? NULL;

        if (
            isset($dataLogin) &&
            isset($id) &&
            isset($full_name) &&
            isset($email) &&
            isset($role) &&
            isset($phone)
        ) {
            return header("Location: http://localhost:8000/dashboard");
        }

        return self::view("Views/Auth.php");
    }

    static function register()
    {
        $role = new Role();
        $data = $role->getRole();
        return self::view("Views/Register.php", $data);
    }

    static function auth()
    {
        if (
            $_REQUEST["email"] == "" ||
            $_REQUEST["password"] == ""
        ) {
            session_start();
            $_SESSION['ERROR'] = "all fields must be filled!";
            return header("Location: http://localhost:8000/auth");
        }

        $user = new Users;
        $user->login(
            $_REQUEST['email'],
            $_REQUEST["password"]
        );
    }

    static function store()
    {
        if (
            $_REQUEST["full_name"] == "" ||
            $_REQUEST["email"] == "" ||
            $_REQUEST["password"] == "" ||
            $_REQUEST["phone"] == ""
        ) {
            session_start();
            $_SESSION['ERROR'] = "all fields must be filled!";
            return header("Location: http://localhost:8000/create-member");
        }

        $user = new Users;
        $user->register(
            $_REQUEST["password"],
            $_REQUEST["full_name"],
            $_REQUEST['phone'],
            $_REQUEST['email'],
            $_REQUEST['role']
        );
    }

    static public function destroy()
    {
        session_start();
        
        session_destroy();

    }
}

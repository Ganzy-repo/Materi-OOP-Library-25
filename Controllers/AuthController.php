<?php

require_once("Controller.php");
require_once("Models/Users.php");

class AuthController extends Controller
{
    static function index()
    {
        return self::view("Views/Auth.php");
    }

    static function auth()
    {
            
        if (
            $_REQUEST['email'] == "" ||
            $_REQUEST['password'] == "" 
        ) {
            session_start();
            $_SESSION['ERROR'] = "all field must be filled";
            return header("Location: http://localhost:8000/auth");
        }

        $user = new Users;
        $user->login(
            $_REQUEST["email"],
            $_REQUEST["password"]
        );
    }

    static function store()
    {
        var_dump($_REQUEST);
        if (
            $_REQUEST['full_name'] == "" ||
            $_REQUEST['email'] == "" ||
            $_REQUEST['password'] == "" ||
            $_REQUEST['phone'] == ""
        ) {
            session_start();
            $_SESSION['ERROR'] = "all field must be filled";
            return header("Location: http://localhost:8000/auth");
        }

        $user = new Users();
        $user->register(
            $_REQUEST["full_name"],
            $_REQUEST["email"],
            $_REQUEST["phone"],
            $_REQUEST["password"]
        );

        echo "METHOD INI AKAN MENJALANKAN FUNCTION POST";
    }
}

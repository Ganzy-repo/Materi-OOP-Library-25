<?php 

require_once("Controller.php");
require_once("model/User.php");

class AuthController extends Controller{
    static function index() {
        return self::view("view/auth.php");
    }
    
    static function store() {
        var_dump($_REQUEST);
        if(
            $_REQUEST['full_name'] == "" ||
            $_REQUEST['email'] == "" ||
            $_REQUEST['password'] == "" ||
            $_REQUEST['phone'] == ""
        ) {
            session_start();
            $_SESSION['ERROR'] = "all field must be filled";
            return header("Location: http://localhost:8000/auth");
        }

        $user = new User();
        $user->register(
            $_REQUEST["password"],
            $_REQUEST["full_name"],
            $_REQUEST["email"],
            $_REQUEST["phone"]
        );

        echo "METHOD INI AKAN MENJALANKAN FUNCTION POST";
    }
}
<?php 

require_once("Controller.php");

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
        echo "METHOD INI AKAN MENJALANKAN FUNCTION POST";
    }
}
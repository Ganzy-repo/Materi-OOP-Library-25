<?php 

require_once("Controller.php");

class HomeController extends Controller{
    static function index() {
        return self::view("view/home.php");
    }

    static function home() {
        $datalogin = $_SESSION["is_login"];
        if(isset($datalogin)) {
            return self::view("view/admin/dashboard.php");
        }

        header("Location: http://localhost:8000/auth");

    }
}
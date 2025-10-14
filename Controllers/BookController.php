<?php
require_once("./Models/Category.php");
require_once("Controller.php");

class BookController extends Controller
{
    static function index()
    {
        session_start();
        $isLogin = $_SESSION["is_login"] ?? false;
        $data = new Category();
        return self::view("Views/Book.php", $data->getData(), $isLogin);
    }
}

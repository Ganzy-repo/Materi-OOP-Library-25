<?php 
require_once("./model/Category.php");
require_once("Controller.php");

class BookController extends Controller{
    static function index() {
        $data = new Category();
        return self::view("view/book.php", $data->getData());
    }
}
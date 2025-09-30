<?php 

require_once("Controller.php");

class BorrowController extends Controller{
    static function index() {
        return self::view("view/borrow.php");
    }
}
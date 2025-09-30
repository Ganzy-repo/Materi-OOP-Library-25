<?php 

require_once("Controller.php");

class MembershipController extends Controller{
    static function index() {
        return self::view("view/membership.php");
    }
}
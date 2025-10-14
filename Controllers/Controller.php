<?php
class Controller
{
    static function view(string $page, $data = [], $isLogin = false)
    {
        $data;
        require $page;
        $isLogin;
    }
}

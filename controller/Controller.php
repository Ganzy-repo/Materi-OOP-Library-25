<?php
class Controller {
    static function view(string $page, $data = []) {
        require $page;
    }
}
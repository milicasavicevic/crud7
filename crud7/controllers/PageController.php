<?php


namespace Controllers;
class PageController
{
    public function home() {
        require_once('views/home.php');
    }
    public function error() {
        require_once('views/404.php');
    }
}
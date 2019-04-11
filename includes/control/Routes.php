<?php


class Routes
{
    public static function route()
    {
        if (isset($_GET['controller'])) {
            $controller = $_GET['controller'];
            require_once './includes/control/' . $controller . '.php';
        } else {
            $controller = "page1Controller";
            require_once './includes/control/' . $controller . '.php';
        }
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "make";
        }

        $contr = new $controller;
        $contr->$action();

    }
}
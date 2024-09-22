<?php

namespace App\Core;


class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
            }

        // получаем имя экшена
        if (!empty($routes[2])) {
            $action_name = $routes[2];
            }

        // добавляем префиксы
        $model_name = $controller_name . 'Model';
        $controller_name = $controller_name . 'Controller';

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = $model_name . '.php';
        $model_path = dirname(__DIR__) . "/app/models/" . $model_file;
        if (file_exists($model_path)) {
            include dirname(__DIR__) . "/app/models/" . $model_file;
            }

        // подцепляем файл с классом контроллера
        $controller_file = $controller_name . '.php';
        $controller_path = dirname(__DIR__) . "\controllers\\" . $controller_file;
        if (file_exists($controller_path)) {
            require $controller_path;
            // echo $controller_path;
            $className = "\App\\Controllers\\" . basename($controller_path, '.php');
            $controller = new $className();
            } else {
            // Route::ErrorPage404();
            echo "404class";
            }

        // создаем контроллер
        // $controller = new $controller_name();
        // $controller = new \App\Controllers\MainController();
        $action = $action_name;

        if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
            } else {
            // Route::ErrorPage404();
            echo "404method";
            }

    }

    static function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}
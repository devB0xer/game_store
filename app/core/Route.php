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
        $model_path = dirname(__DIR__) . "/models/" . $model_file;
        if (file_exists($model_path)) {
            include dirname(__DIR__) . "/models/" . $model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = $controller_name . '.php';
        $controller_path = dirname(__DIR__) . "\controllers\\" . $controller_file;
        if (file_exists($controller_path)) {
            require $controller_path;
            $className = "\App\\Controllers\\" . basename($controller_path, '.php');
            $controller = new $className();
        } else {
            return Route::ErrorPage404();
        }

        $action = $action_name;

        if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
        } else {
            return Route::ErrorPage404();
        }

    }

    static function ErrorPage404()
    {
        http_response_code(404);
    }
}
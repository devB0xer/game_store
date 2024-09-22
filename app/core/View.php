<?php

namespace App\Core;

class View
{
    public $template_view; // здесь можно указать общий вид по умолчанию.

    function generate($content_view, $template_view, $data = null)
    {

        if (is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data, EXTR_PREFIX_ALL, 'data');
        }


        include dirname(__DIR__). '/views/' . $template_view;
    }

    function generate_404()
    {
        include dirname(__DIR__). '/views/404_view.php';
    }
}
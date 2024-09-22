<?php

namespace App\Controllers;

use App\Core\Controller;

class MainController extends Controller
{
    function index()
    {
        $this->view->generate('main_view.php', 'template_view.php');
    }
}
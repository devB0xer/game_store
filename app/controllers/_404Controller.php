<?php

namespace App\Controllers;

use App\Core\Controller;

class _404Controller extends Controller
{
    function index($page)
    {
        $this->view->generate_404($page);
    }
}
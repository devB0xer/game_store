<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\GameModel;
use App\Core\View;

class GameController extends Controller
{
    function __construct(){
        $this->model = new GameModel();
        $this->view = new View();
    }

    function index()
    {
        $data = $this->model->getAll();
        var_dump($data);
        $this->view->generate('game_view.php', 'template_view.php', $data);
    }
}
<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\GameModel;

class GameController extends Controller
{
    function __construct(){
        parent::__construct();
    }

    function index()
    {
        $model = new GameModel();
        $games = $model->getAll();
        $this->view->generate('game_view.php', 
        'template_view.php', 
        [
            'games' => $games,
        ]);
    }
}
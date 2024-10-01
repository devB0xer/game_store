<?php
namespace App;

require_once dirname(__DIR__) . '/app/core/Route.php';
require_once dirname(__DIR__) . '/app/core/Model.php';
require_once dirname(__DIR__) . '/app/core/View.php';
require_once dirname(__DIR__) . '/app/core/Controller.php';
require_once dirname(__DIR__) . '/app/config/Database.php';

use App\Core\Controller;
use App\Config\Database;
use App\Core\Model;
use App\Core\View;
use App\Core\Route;

Route::start();



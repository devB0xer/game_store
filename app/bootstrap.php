<?php
namespace App;

require_once dirname(__DIR__) . '/app/core/Route.php';
require_once dirname(__DIR__) . '/app/core/Model.php';
require_once dirname(__DIR__) . '/app/core/View.php';
require_once dirname(__DIR__) . '/app/core/Controller.php';
require_once dirname(__DIR__) . '/app/config/DatabaseConfig.php';
require_once dirname(__DIR__) . '/app/DB/Database.php';

use App\Core\Route;

Route::start();



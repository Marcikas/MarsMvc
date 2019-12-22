<?php

use App\Config\Autoloader;

require_once "config/Autoload.php";
require_once "vendor/autoload.php";

new Autoloader();

require_once "Routes/routes.php";

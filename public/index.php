<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Http\Kernel;
use App\Http\Request;

// Bootstrap and run the framework
$request = Request::capture();
$kernel = new Kernel;
$response = $kernel->handle($request);
$response->send();

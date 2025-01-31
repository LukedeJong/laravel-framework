<?php

namespace App\Middleware;

class TrimStrings
{
    public function handle($request)
    {
        $_POST = array_map('trim', $_POST);
    }
}

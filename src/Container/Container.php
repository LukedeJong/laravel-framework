<?php

namespace App\Container;

class Container
{
    protected $bindings = [];

    public function bind($key, $value)
    {
        $this->bindings[$key] = $value;
    }

    public function make($key)
    {
        return isset($this->bindings[$key]) ? $this->bindings[$key]() : null;
    }
}

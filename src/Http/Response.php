<?php

namespace App\Http;

class Response
{
    protected $content;

    protected $status;

    public function __construct($content, $status = 200)
    {
        $this->content = $content;
        $this->status = $status;
    }

    public function send()
    {
        http_response_code($this->status);
        echo $this->content;
    }
}

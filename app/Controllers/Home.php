<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $a = "test1";
        return view('welcome_message');
    }
}

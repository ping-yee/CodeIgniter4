<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $a = "test1";
        $a = "test2";
        $a = "test3";
        return view('welcome_message');
    }
}

<?php

namespace App\Controllers;

class LoginPageController extends BaseController
{
    public function index(): string
    {
        return view('templates/header')
            . view('templates/navigation')
            . view('auth/login')
            . view('templates/footer');
    }
}

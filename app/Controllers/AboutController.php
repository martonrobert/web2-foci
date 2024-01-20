<?php

namespace App\Controllers;

class AboutController extends BaseController
{
    public function index(): string
    {

        return view('templates/header', array('auth' => $this->tokenData))
        . view('templates/navigation')
        . view('pages/about')
        . view('templates/footer');
    }
}
<?php

namespace App\Controllers;
use App\Models\NewsModel;

class HomePageController extends BaseController
{
    public function index(): string
    {

        return view('templates/header', array('auth' => $this->tokenData))
        . view('templates/navigation')
        . view('pages/home')
        . view('templates/footer');
    }
}

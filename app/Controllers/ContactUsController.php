<?php

namespace App\Controllers;

class ContactUsController extends BaseController
{
    public function index(): string
    {

        return view('templates/header', array('auth' => $this->tokenData))
        . view('templates/navigation')
        . view('pages/contact_us')
        . view('templates/footer');
    }
}
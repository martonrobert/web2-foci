<?php

namespace App\Controllers;


class RegisztracioPageController extends BaseController {


    public function index() {

        return view('templates/header')
            . view('templates/navigation')
            . view('auth/signup')
            . view('templates/footer');
    }


}

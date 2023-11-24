<?php

namespace App\Controllers;
use App\Models\NewsModel;

class KlubListaViewController extends BaseController {

    public function index() {

        return view('templates/header', array('auth' => $this->tokenData))
        . view('templates/navigation')
        . view('pages/klublista')
        . view('templates/footer');        

    }

}
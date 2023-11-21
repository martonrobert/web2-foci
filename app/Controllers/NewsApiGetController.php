<?php

namespace App\Controllers;
use App\Models\NewsModel;

class NewsApiGetController extends BaseController {


    public function index() {


        $newsModel = new NewsModel(\Config\Database::connect());
        $news = $newsModel->getLatestNews();

        return $this->response->setJSON($news);

        //return json_encode($news);
    }


}
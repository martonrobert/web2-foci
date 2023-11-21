<?php


namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use App\Entities\User;


class NewsModel {

    protected $db;

    public function __construct(ConnectionInterface $db)
    {
        $this->db = $db;
    }


    public function getLatestNews($count = 10) {

        return array(
            array('id' => 1, 'time' => '2023-10-24 10:00', 
                'title' => 'Még mindig nem tudni, lesz-e bolgár-magyar – Dibusz a pályán harcolná ki az Eb-re jutást', 
                'url' => 'https://hvg.hu/sport/20231114_Bulgaria_Dibusz_bolgarmagyar_labdarugas_magyar_valogatott#rss', 
                'img' => 'https://omapi.sporttube.com/image_upload/2023/11/14/hwgObiP1o6q1wVc.jpg',
                'content' => ''),
                array('id' => 1, 'time' => '2023-10-24 10:00', 
                'title' => 'Még mindig nem tudni, lesz-e bolgár-magyar – Dibusz a pályán harcolná ki az Eb-re jutást', 
                'url' => 'https://hvg.hu/sport/20231114_Bulgaria_Dibusz_bolgarmagyar_labdarugas_magyar_valogatott#rss', 
                'img' => 'https://omapi.sporttube.com/image_upload/2023/11/14/hwgObiP1o6q1wVc.jpg',
                'content' => ''),
                array('id' => 1, 'time' => '2023-10-24 10:00', 
                'title' => 'Még mindig nem tudni, lesz-e bolgár-magyar – Dibusz a pályán harcolná ki az Eb-re jutást', 
                'url' => 'https://hvg.hu/sport/20231114_Bulgaria_Dibusz_bolgarmagyar_labdarugas_magyar_valogatott#rss', 
                'img' => 'https://omapi.sporttube.com/image_upload/2023/11/14/hwgObiP1o6q1wVc.jpg',
                'content' => ''),
                array('id' => 1, 'time' => '2023-10-24 10:00', 
                'title' => 'Még mindig nem tudni, lesz-e bolgár-magyar – Dibusz a pályán harcolná ki az Eb-re jutást', 
                'url' => 'https://hvg.hu/sport/20231114_Bulgaria_Dibusz_bolgarmagyar_labdarugas_magyar_valogatott#rss', 
                'img' => 'https://omapi.sporttube.com/image_upload/2023/11/14/hwgObiP1o6q1wVc.jpg',
                'content' => ''),
                array('id' => 1, 'time' => '2023-10-24 10:00', 
                'title' => 'Még mindig nem tudni, lesz-e bolgár-magyar – Dibusz a pályán harcolná ki az Eb-re jutást', 
                'url' => 'https://hvg.hu/sport/20231114_Bulgaria_Dibusz_bolgarmagyar_labdarugas_magyar_valogatott#rss', 
                'img' => 'https://omapi.sporttube.com/image_upload/2023/11/14/hwgObiP1o6q1wVc.jpg',
                'content' => ''),
        );
    }

}
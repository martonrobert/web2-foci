<?php


namespace App\Controllers;

use App\Models\KlubModel;
use Exception;


class KlubListaGetController extends BaseController {


    public function index() {
        try {
            $db = \Config\Database::connect();
            $model = new KlubModel($db);

            

            $data = $model->getKlubLista();
            $this->response->setHeader('Content-Type', 'application/json; charset=utf-8');
            return $this->response->setJSON($data);
           
        } catch (Exception $e) {
            log_message('error', print_r($e, true));
            $this->response->setStatusCode(500);
            return $this->response->setJSON(array('status' => 'error', 'message' => $e->getMessage(), 'uid' => 0));             
        }
    }


}
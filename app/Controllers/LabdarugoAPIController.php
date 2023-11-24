<?php

namespace App\Controllers;

use App\Models\JatekosModel;
use Exception;

class LabdarugoAPIController extends BaseController {


    public function index($klubId) {
        try {
            $db = \Config\Database::connect();
            $model = new JatekosModel($db);
            log_message('debug', 'LabdarugoAPIController: ' . $klubId);
            $data = $model->getJatekosLista($klubId);
            $this->response->setHeader('Content-Type', 'application/json; charset=utf-8');
            return $this->response->setJSON($data);
           
        } catch (Exception $e) {
            log_message('error', print_r($e, true));
            $this->response->setStatusCode(500);
            return $this->response->setJSON(array('status' => 'error', 'message' => $e->getMessage(), 'uid' => 0));             
        }
    }

}
<?php

namespace App\Controllers;

use App\Models\UserModel;
use Exception;

class LogoutPageController extends BaseController {

    public function index() {

        try {
            helper('cookie');
            $db = \Config\Database::connect();
            $model = new UserModel($db);
            $token = get_cookie('foci-ssid');

            if ($token) {
                $model->removeUserToken($token);
                delete_cookie('foci-ssid', 'foci.martonrobert.hu');
            }
            
            $this->response->setHeader('Location', '/');
            $this->response->setHeader('Content-Type', 'application/json; charset=utf-8');
            return $this->response->setJSON(array('status' => 'success'));
        } 
        catch (Exception $e) {
            log_message('error', print_r($e, true));
            $this->response->setStatusCode(500);
            return $this->response->setJSON(array('status' => 'error', 'message' => $e->getMessage())); 
        }

    }

}
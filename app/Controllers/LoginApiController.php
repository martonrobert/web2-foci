<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Entities\User;
use Exception;

class LoginApiController extends BaseController {


    public function index() {

        // authentikáció, a válasz egy json struktúra
        try {
            $db = \Config\Database::connect();
            $model = new UserModel($db);
            $user = $model->authenticateUser($this->request->getVar('username'), $this->request->getVar('password'));
            $token = $model->createUserToken($user);

            helper('cookie');
            set_cookie('foci-ssid',$token->token_str, 36000, 'foci.martonrobert.hu');
            
            $this->response->setHeader('Content-Type', 'application/json; charset=utf-8');
            
            return $this->response->setJSON(array('status' => 'success', 'uid' => (int) $user->id));
        } 
        catch (Exception $e) {
            log_message('error', print_r($e, true));
            $this->response->setStatusCode(500);
            return $this->response->setJSON(array('status' => 'error', 'message' => $e->getMessage(), 'uid' => 0)); 
        }

        

    }

}
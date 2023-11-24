<?php


namespace App\Controllers;

use App\Models\UserModel;
use App\Entities\User;
use Exception;

class SignupApiController extends BaseController {


    public function index() {

        // regisztráció
        try {
            $db = \Config\Database::connect();
            $user = new User();
            $model = new UserModel($db);

            $user->id = 0;
            $user->nev = $this->request->getVar('nev');
            $user->adminisztrator = 0;
            $user->email = $this->request->getVar('email');
            $user->telefon = $this->request->getVar('telefon');
            $user->kod = $model->createUserCode();
            $user->jelszo = $model->encodePwd($this->request->getVar('jelszo'), $user->kod);
            $user->regisztracio = date('Y-m-d H:i:s');
            $user->email_megerosítve = null;
            $user->allapot = 'A';

            $model->addUser($user);
            
            return json_encode(array(
                'status' => 'success',
                'id' => $user->id
            ));            
        } catch (Exception $e) {
            
        }

    }


}
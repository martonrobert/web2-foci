<?php

namespace App\Controllers;
use App\Models\UserModel;

class UserListController extends BaseController
{
    public function index(): string
    {

        try {
            $db = \Config\Database::connect();
            $model = new UserModel($db);
    
            $userList = $model->getUserList();
    
            return view('templates/header', array('auth' => $this->tokenData))
                . view('templates/navigation')
                . view('pages/user_list', array('userList' => $userList))
                . view('templates/footer');
        }
        catch (\Exception $e) {

        }


    }
}
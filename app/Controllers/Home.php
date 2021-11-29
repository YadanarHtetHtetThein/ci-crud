<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data = $userModel->findAll();
        // dd($data);
        return view('index',['users'=>$data]);
    }
}

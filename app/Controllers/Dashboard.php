<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $id = session()->get('loggedUser');
        $memberModel = new MemberModel();
        $member = $memberModel->find($id);
        $data = [
            'title' => 'Dashboard',
            'member' => $member,
        ];
        return view('dashboard/index',$data);
    }
}

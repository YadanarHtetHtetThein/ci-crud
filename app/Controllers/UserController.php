<?php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller 
{
    //user home page
    public function index(){
        $userModel = new UserModel();
        $data = $userModel->orderBy('id', 'DESC')->findAll();
        return view('user_view', ['users'=>$data]);
        // return "Hello User";
    }

    //create form view
    public function create(){
        return view('add_user');
    }

    //save user data
    public function store(){
        $userModel = new UserModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
        ];
        $userModel->insert($data);
        return $this->response->redirect(site_url('/users-list'));
    }

    //update form view
    public function edit($id = null){
        $userModel = new UserModel();
        $user = $userModel->where('id',$id)->first();
        return view('edit_user',['user_obj'=>$user]);
    }

    //update user data
    public function update(){
        $userModel = new UserModel();
        $id = $this->request->getVar('id');
        $user = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
        ];
        // dd($user);
        $userModel->update($id, $user);
        // dd('updated');
        return $this->response->redirect(site_url('/users-list'));
    }

    //delete user data
    public function delete($id = null){
        // dd($id);
        $userModel = new UserModel();
        $userModel->where('id',$id)->delete();
        return $this->response->redirect(site_url('/users-list'));
    }
}
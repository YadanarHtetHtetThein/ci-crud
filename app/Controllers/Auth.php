<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\MemberModel;
use App\Controllers\BaseController;

class Auth extends BaseController
{

    public function __construct(){
        helper(['url','form']);
    }
    public function index()
    {
        return view('auth/login');
    }
    public function register(){
        return view('auth/register');
    }
    public function save(){
        $validation = $this->validate([
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[members.email]',
            'password' => 'required|min_length[8]|max_length[12]',
            'cpassword' => 'required|min_length[8]|max_length[12]|matches[password]',
        ]);

        if(!$validation){
            return view('auth/register',['validation'=>$this->validator]);
        }else{
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => Hash::make($this->request->getPost('password')),
            ];
            $memberModel = new MemberModel();
            $query = $memberModel->insert($data);
            if(!$query){
                return redirect->back()->with('fail','Something went wrong');
            }else{
                return redirect()->to('auth/register')->with('success', 'you are now registered successfully');
            }
        }
        return 'Save';
    }
    public function login(){
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[members.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Enter a valid email address',
                    'is_not_unique' => 'This email is not registered on our service',
                ]
                ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[12]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must be at least 8 characters in length',
                    'max_length' => 'Password must not more than 12 characters in length'
                ]
            ]
        ]);

        if(!$validation){
            return view('auth/login',['validation'=>$this->validator]);
        }else{
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $memberModel = new MemberModel();
            $member = $memberModel->where('email',$email)->first();
            $check_password = Hash::check($password,$member['password']);
            if(!$check_password){
                return redirect()->to('auth')->withInput()->with('fail','Incorrect password');
            }else{
                session()->set('loggedUser',$member['id']);
                return redirect()->to('/dashboard');
            }
        }
    }
    function logout(){
        if(session()->has('loggedUser')){
            session()->remove('loggedUser');
            return redirect()->to('/auth?access=out')->with('fail','You are logged out.');
        }
    }
}

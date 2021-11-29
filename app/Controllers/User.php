<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        //
    }
    public function myForm(){
        if($this->request->getMethod() == 'post'){
    
            $file = $this->request->getFile('profile_image');
            $file_type = $file->getClientMimeType();
            $valid_file_types = array('image/png','image/jpeg','image/jpg');
            $session = session();

            if(in_array($file_type, $valid_file_types)){
                $profile_image = uniqid().'_'.$file->getName();
            if($file->move('images',$profile_image)){
                $userModel = new UserModel();

                $data = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'phone_no' => $this->request->getVar('phone_no'),
                    'profile_image' => '/images/'.$profile_image,
                ];

                if($userModel->insert($data)){
                    $session->setFlashdata('success','Data saved successful');
                }else{
                    $session->setFlashdata('error','Failed to save data');
                }
            }else{
                $session->setFlashdata('error', 'Failed to move file');
            }
        }else{
            $session->setFlashdata('error','Invalid file type selected');
        }
        return redirect()->to(base_url());
    }
    return view('my-form');
        
    }
}
